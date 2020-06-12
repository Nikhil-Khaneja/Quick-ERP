<?php
class Customer
{
    private $table = "customers";
    private $columns = ['id', 'first_name', 'last_name', 'gst_no', 'phone_no', 'email_id', 'gender', 'created_at', 'updated_at'];
    protected $di;
    private $database;
    private $validator;

    public function __construct(DependencyInjector $di)
    {
        $this->di = $di;
        $this->database = $this->di->get('database');
    }

    public function getValidator(){
        return $this->validator;
    }

    public function validateData($data)
    {
        $this->validator = $this->di->get('validator');
        $this->validator = $this->validator->check($data,[
            'first_name' =>[
                'required' => true,
                'minlength' => 3,
                'maxlength' => 20,
                'unique' =>$this->table
            ],
            'last_name' =>[
                'required' => true,
                'minlength' => 3,
                'maxlength' => 20,
                'unique' =>$this->table
            ],
            'gst_no' =>[
                'required' => true,
                'minlength' => 15,
                'unique' => $this->table
            ]
        ]);
    }

    public function addCustomer($data)
    {
        //VALIDATE DATA

        $this->validateData($data);

        //INSERT DATA IN DATABSE

        if(!$this->validator->fails())
        {
            try
            {
                $this->database->beginTransaction();
                //change this data before performin
                $data_to_be_inserted = ['first_name' => $data['first_name'], 'last_name' => $data['last_name'], 'gst_no' => $data['gst_no'], 'phone_no' => $data['phone_no'], 'email_id' => $data['email_id'], 'gender' => $data['gender']];
                $customer_id =$this->database->insert($this->table,$data_to_be_inserted);
                $this->database->commit();
                return ADD_SUCCESS;

            }catch(Exception $e){
                $this->database->rollBack();
                //Util::dd($e);
                return ADD_ERROR;
            }
        }

        return VALIDATION_ERROR;

        //RETURN THE STATUS OF OPERATION
    }

    public function getJSONDataForDataTable($draw, $search_parameter, $order_by, $start, $length)
    {
        $query = "SELECT * FROM {$this->table} WHERE deleted = 0";
        $totalRowCountQuery = "SELECT COUNT(*) as total_count FROM {$this->table} WHERE deleted = 0";
        $filteredRowCountQuery = "SELECT COUNT(*) as total_count FROM {$this->table} WHERE deleted = 0";
        
        if($search_parameter != null){
            $query.= " AND first_name LIKE '%{$search_parameter}%'";
            $filteredRowCountQuery.= " AND first_name LIKE '%{$search_parameter}%'";
            //Util::dd($filteredRowCountQuery);
        }

        if($order_by !=null){
            $query.= " ORDER BY {$this->columns[$order_by[0]['column']]} {$order_by[0]['dir']}" ;
            $filteredRowCountQuery.= " ORDER BY {$this->columns[$order_by[0]['column']]} {$order_by[0]['dir']}" ;
            
        }
        else{
            $query.= " ORDER BY {$this->columns[0]} ASC";
            $filteredRowCountQuery.= " ORDER BY {$this->columns[0]} ASC";
        }

        if( $length != -1){
            $query.= " LIMIT {$start}, {$length}";
        }
        
        $totalRowCountResult = $this->database->raw($totalRowCountQuery);
        $numOfTotalRows = is_array($totalRowCountResult) ? $totalRowCountResult[0]->total_count : 0;
        
        $filteredRowCountResult = $this->database->raw($filteredRowCountQuery);
        $numOfFilteredRows = is_array($filteredRowCountResult) ? $filteredRowCountResult[0]->total_count : 0;
        
        $fetchedData = $this->database->raw($query);
        $data = [];
        $numRows = is_array($fetchedData) ? count($fetchedData) : 0;
        for ($i=0; $i <$numRows ; $i++) { 
            # code...
            $subArray = [];
            $subArray[] = $start+$i+1;
            $subArray[] = $fetchedData[$i]->first_name;
            $subArray[] = $fetchedData[$i]->last_name;
            $subArray[] = $fetchedData[$i]->gst_no;
            $subArray[] = $fetchedData[$i]->phone_no;
            $subArray[] = $fetchedData[$i]->email_id;
            $subArray[] = $fetchedData[$i]->gender;
            $subArray[] = $fetchedData[$i]->created_at;
            $subArray[] = $fetchedData[$i]->updated_at;            
            $subArray[] = <<<BUTTONS
<button class = 'btn btn-outline-primary btn-sm' data-id = '{$fetchedData[$i]->id}'><i class = "fas fa-pencil-alt"></i></button>                 
<button class = 'btn btn-outline-danger btn-sm' data-id = '{$fetchedData[$i]->id}'><i class = "fas fa-trash-alt"></i></button>                 
BUTTONS;

            $data[] = $subArray;
        }

        $output = array(
            'draw'=>$draw,
            'recordsTotal'=>$numOfTotalRows,
            'recordsFiltered'=>$numOfFilteredRows,
            'data'=>$data
        );
        echo json_encode($output);
    }

}
?>