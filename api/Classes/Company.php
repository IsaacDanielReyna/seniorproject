<?php
	Class Company
	{

		private $connection;
		private $user;
		
		function __construct($connection, $user) //default constructor
		{
			$this->connection = $connection;
			$this->user = $user;
		}
		
		public function IsNullOrEmpty($str)
		{
			$result = false;
			$str = preg_replace('/\s+/', '', $str);
			if ($str == null || $str == '')
				$result = true;
			return $result;
		}

		public function Insert($company)
		{
			try
			{
				if ($this->IsNullOrEmpty($company->name))
				{
					$data = new stdClass();
					$data->result = false;
					$data->messages[] = "Name must not be empty";
					return json_encode($data);
				}
				else
				{					
					if (!$this->IsNullOrEmpty($company->description))
						$values[] = "description";
					if (!$this->IsNullOrEmpty($company->address))
						$values[] = "address";
					if (!$this->IsNullOrEmpty($company->city))
						$values[] = "city";
					if (!$this->IsNullOrEmpty($company->state))
						$values[] = "state";
					if (!$this->IsNullOrEmpty($company->zip))
						$values[] = "zip";
					if (!$this->IsNullOrEmpty($company->country))
						$values[] = "country";
					if (!$this->IsNullOrEmpty($company->timezone))
						$values[] = "timezone";
					$values[] = "name";
					$values[] = "employer";
					
					
					$sql = "INSERT INTO companies (" .implode(', ', $values). ") VALUES (:" .implode(', :', $values). ")";
					$stmt = $this->connection->prepare($sql);
					$stmt->bindParam( ':employer', $this->user->id );
					$stmt->bindParam( ':name', $company->name );
					
					if (!$this->IsNullOrEmpty($company->description))
						$stmt->bindParam( ':description', $company->description );
					if (!$this->IsNullOrEmpty($company->address))
						$stmt->bindParam( ':address', $company->address );
					if (!$this->IsNullOrEmpty($company->city))
						$stmt->bindParam( ':city', $company->city );
					if (!$this->IsNullOrEmpty($company->state))
						$stmt->bindParam( ':state', $company->state );
					if (!$this->IsNullOrEmpty($company->zip))
						$stmt->bindParam( ':zip', $company->zip );
					if (!$this->IsNullOrEmpty($company->country))
						$stmt->bindParam( ':country', $company->country );
					if (!$this->IsNullOrEmpty($company->timezone))
						$stmt->bindParam( ':timezone', $company->timezone );
					
					$stmt->execute();

					$result = $stmt->rowCount();
					
					$data = new stdClass();
					if ($result)
					{
						$data->result = true;
						$data->messages[] = "Insertion successful";
					}
					else
					{
						$data->result = false;
						$data->messages[] = "Permission Denied";
					}

					return json_encode($data);
				}
			}
			catch( PDOException $e ){
				$data = new stdClass();
				$data->result = false;
				$data->messages[] = $e->getMessage();
				return json_encode($data);
			}
		}
		
		public function Update($company)
		{
			try{
				if ($this->IsNullOrEmpty($company->name))
				{
					$data = new stdClass();
					$data->result = false;
					$data->messages[] = "Name must not be empty";
				}
				else
				{
						$set[] = "name=:name";
					//if (!$this->IsNullOrEmpty($company->description))
						$set[] = "description=:description";
					//if (!$this->IsNullOrEmpty($company->address))
						$set[] = "address=:address";
					//if (!$this->IsNullOrEmpty($company->city))
						$set[] = "city=:city";
					//if (!$this->IsNullOrEmpty($company->state))
						$set[] = "state=:state";
					//if (!$this->IsNullOrEmpty($company->zip))
						$set[] = "zip=:zip";
					//if (!$this->IsNullOrEmpty($company->country))
						$set[] = "country=:country";
					//if (!$this->IsNullOrEmpty($company->timezone))
						$set[] = "timezone=:timezone";

					$sql = "UPDATE companies SET " .implode(', ', $set). " WHERE id=:company AND employer=:user";
					
					$stmt = $this->connection->prepare($sql);
					$stmt->bindParam( ':user', $this->user->id );
					$stmt->bindParam( ':company', $company->target );
					
					//if (!$this->IsNullOrEmpty($company->name))
						$stmt->bindParam( ':name', $company->name );
					//if (!$this->IsNullOrEmpty($company->description))
						$stmt->bindParam( ':description', $company->description );
					//if (!$this->IsNullOrEmpty($company->address))
						$stmt->bindParam( ':address', $company->address );
					//if (!$this->IsNullOrEmpty($company->city))
						$stmt->bindParam( ':city', $company->city );
					//if (!$this->IsNullOrEmpty($company->state))
						$stmt->bindParam( ':state', $company->state );
					//if (!$this->IsNullOrEmpty($company->zip))
						$stmt->bindParam( ':zip', $company->zip );
					//if (!$this->IsNullOrEmpty($company->country))
						$stmt->bindParam( ':country', $company->country );
					//if (!$this->IsNullOrEmpty($company->timezone))
						$stmt->bindParam( ':timezone', $company->timezone );
					
					$stmt->execute();
					$result = $stmt->rowCount();
					
					$data = new stdClass();
					if ($result)
					{
						$data->result = true;
						$data->messages[] = "Update Successful";
					}
					else
					{
						$data->result = false;
						$data->messages[] = "Permission Denied";
						$data->messages[] = "Record doesn't exist";
						$data->messages[] = "Resubmitted same data";
					}
				}
				return json_encode($data);
				
			}
			catch( PDOException $e ){
				$data = new stdClass();
				$data->result = false;
				$data->messages[] = $e->getMessage();
				return json_encode($data);
			}
			
		}
		
		public function Remove($company)
		{
			try{
				$sql = "DELETE FROM companies WHERE id=:id AND employer=:user";
				$stmt = $this->connection->prepare($sql);
				$stmt->bindParam( ':id', $company->target );
				$stmt->bindParam( ':user', $this->user->id );
				$stmt->execute();
				
				$result = $stmt->rowCount();
				
				$data = new stdClass();
				if ($result)
				{
					$data->result = true;
					$data->messages[] = "Deletion Successful";
				}
				else
				{
					$data->result = false;
					$data->messages[] = "Permission Denied or record doesn't exist";
				}

				return json_encode($data);
			}
			catch( PDOException $e ){				
				$data = new stdClass();
				$data->result = false;
				$data->messages[] = $e->getMessage();
				return json_encode($data);
			}
		}
		
		public function ListAll(){
			try{
				$sql = "SELECT * FROM companies WHERE employer=:user ORDER BY name ASC";
				$stmt = $this->connection->prepare($sql);
				$stmt->bindParam( ':user', $this->user->id );
				$stmt->execute();
				$companies=$stmt->fetchAll(PDO::FETCH_ASSOC);

				$data = new stdClass();
				$data->companies=$companies;
				$data->result = true;
				$data->messages[] = "Selection successful";
				return json_encode($data);
			}
			catch( PDOException $e ){				
				$data = new stdClass();
				$data->result = false;
				$data->messages[] = $e->getMessage();
				return json_encode($data);
			}
		}
	}
?>