<?php
	Class User
	{
		private $connection;
		private $user;
		
		function __construct($connection) //default constructor
		{
			$this->connection = $connection;
		}
		
		public function IsNullOrEmpty($str)
		{
			$result = false;
			$str = preg_replace('/\s+/', '', $str);
			if ($str == null || $str == '')
				$result = true;
			return $result;
		}
		
		
		public function UpdatePassword($post)
		{
			if ($this->IsNullOrEmpty($post->password1) || $this->IsNullOrEmpty($post->password2))
			{
				$data = new stdClass();
				$data->result = false;
				$data->messages[] = "Passwords must not be empty.";
				return json_encode($data);
			}
			if ($post->password1 != $post->password2)
			{
				$data = new stdClass();
				$data->result = false;
				$data->messages[] = "Passwords do not match";
				return json_encode($data);
			}
			else 
			{
				
				$password = password_hash($post->password1, PASSWORD_DEFAULT, ['cost' => 12]);
				$sql = "UPDATE users SET password=:password, email=:email WHERE id=:user";
				$stmt = $this->connection->prepare($sql);
				$stmt->bindParam( ':user', $this->user->id );
				$stmt->bindParam( ':password', $password );
				$stmt->execute();
				
				$data = new stdClass();
				$data->result = false;
				$data->messages[] = "Password updated successfully";
				return json_encode($data);
			}
		}
		
		public function SetDefaultCompany()
		{
			$set[] = "default_company=:default_company";
		}
		
		public function UpdateProfilePhoto()
		{
			$post->photo;
		}
		
		public function Update($jwt, $post)
		{
			try
			{
				$this->user = $jwt->decode($post->token, SECRET_SERVER_KEY);
			}
			catch( Exception  $e ){
				$data = new stdClass();
				$data->result = false;
				$data->messages[] = "Invalid Token";
				return json_encode($data);
				die();
			}
			
			if (isset($post->email))
			{
				if (!$this->IsNullOrEmpty($post->email))
					$set[] = "email=:email";
				else
				{
					$data = new stdClass();
					$data->result = false;
					$data->messages[] = "Email must not be empty";
					return json_encode($data);
					die();
				}
			}
			
			if (isset($post->password1) || isset($post->password2))
			{
				$password = false;
				if ($this->IsNullOrEmpty($post->password1) || $this->IsNullOrEmpty($post->password2))
				{
					$data = new stdClass();
					$data->result = false;
					$data->messages[] = "Passwords must not be empty";
					return json_encode($data);
					die();
				}
				else if($post->password1 != $post->password2)
				{
					$data = new stdClass();
					$data->result = false;
					$data->messages[] = "Passwords do not match";
					return json_encode($data);
					die();
				}
				else
				{
					$post->password1 = password_hash($post->password1, PASSWORD_DEFAULT, ['cost' => 12]);
					$set[] = "password=:password";
				}
			}
			
			if (isset($post->first_name))
				$set[] = "first_name=:first_name";
			if (isset($post->middle_name))
				$set[] = "middle_name=:middle_name";
			if (isset($post->last_name))
				$set[] = "last_name=:last_name";
			if (isset($post->phone_number))
				$set[] = "phone_number=:phone_number";
			if (isset($post->address))
				$set[] = "address=:address";
			if (isset($post->city))
				$set[] = "city=:city";
			if (isset($post->state))
				$set[] = "state=:state";
			if (isset($post->zip_code))
				$set[] = "zip_code=:zip_code";
			
			$sql = "UPDATE users SET " .implode(', ', $set). " WHERE id=:user";
			$stmt = $this->connection->prepare($sql);
			
			$stmt->bindParam( ':user', $this->user->id );
			
			if (isset($post->password1))
				$stmt->bindParam( ':password', $post->password1 );
			if (isset($post->email))
				$stmt->bindParam( ':email', $post->email );
			if (isset($post->first_name))
				$stmt->bindParam( ':first_name', $post->first_name );
			if (isset($post->middle_name))
				$stmt->bindParam( ':middle_name', $post->middle_name );$set[] = "middle_name=:middle_name";
			if (isset($post->last_name))
				$stmt->bindParam( ':last_name', $post->last_name );
			if (isset($post->phone_number))
				$stmt->bindParam( ':phone_number', $post->phone_number );
			if (isset($post->address))
				$stmt->bindParam( ':address', $post->address);
			if (isset($post->city))
				$stmt->bindParam( ':city', $post->city );
			if (isset($post->state))
				$stmt->bindParam( ':state', $post->state );
			if (isset($post->zip_code))
				$stmt->bindParam( ':zip_code', $post->zip_code);
			$stmt->execute();
			
			$data = new stdClass();
			$data->result = true;
			$data->post = $post;
			$data->messages[] = "Update successful";
			$data->messages[] = "EMAIL: " . $post->email;
			$data->messages[] = "SQL: " . $sql;
			
			return json_encode($data);
		}
		public function Register($jwt, $post)
		{
			$json = new stdClass();
			
			$username = $post->username;
			$email = $post->email;
			if ($post->password1 != $post->password2)
			{
				$data = new stdClass();
				$data->result = false;
				$data->messages[] = "Passwords don't match";
				return json_encode($data);
			}
			else
			{
				if ($this->IsNullOrEmpty($post->username) || $this->IsNullOrEmpty($post->password1)|| $this->IsNullOrEmpty($post->email))
				{
					$data = new stdClass();
					$data->result = false;
					$data->messages[] = "Inputs: uername, password, and email must not be empty";
					return json_encode($data);
				}
				else
				{
					try
					{	
						$sql = "SELECT * FROM users WHERE username=:username OR email=:email";
						$stmt = $this->connection->prepare($sql);
						$stmt->bindParam( ':username', $post->username );
						$stmt->bindParam( ':email', $post->email );
						$stmt->execute();
					}
					catch( PDOException $e )
					{
						$data = new stdClass();
						$data->result = false;
						$data->messages[] = $e->getMessage();
						return json_encode($data);
					}
					$row=$stmt->fetch();
					
					if (!$row)
					{
						// Username or Email does not exist, therefore, user can register.
						$hash = password_hash($post->password1, PASSWORD_DEFAULT, ['cost' => 12]);
						$token = "NA";
						try
						{	
							$sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email);";
							$stmt = $this->connection->prepare($sql);
							$stmt->bindParam( ':username', $post->username );
							$stmt->bindParam( ':password', $hash );
							$stmt->bindParam( ':email', $post->email );
							$stmt->execute();
							$uid = $this->connection->lastInsertId();
							

							try
							{
								$payload = new stdClass();
								$payload->id = $uid;
								$token = $jwt->encode($payload, SECRET_SERVER_KEY);
							}
							catch(Exception  $e)
							{
								$data = new stdClass();
								$data->result = false;
								$data->messages[] = "Invalid token format";
								return json_encode($data);
							}
							
							
							$data = new stdClass();
							$data->result = true;
							$data->token = $token;
							$data->messages[] = "Registration successful";
							return json_encode($data);
						}
						catch( PDOException $e )
						{
							$data = new stdClass();
							$data->result = false;
							$data->messages[] = $e->getMessage();
							return json_encode($data);
						}
					}
					else
					{
						$data = new stdClass();
						$data->result = false;
						$data->messages[] = "Username or Email already taken";
						return json_encode($data);
					}

					
				}
			}
			echo json_encode($json);
		}
		public function Login($jwt, $post)
		{
			try
			{	
				$sql = "SELECT * FROM users WHERE username=:username OR email=:username";
				$stmt = $this->connection->prepare($sql);
				$stmt->bindParam( ':username', $post->username );
				$stmt->execute();
			}
			catch( PDOException $e )
			{
				$data = new stdClass();
				$data->result = false;
				$data->messages[] = $e->getMessage();
				return json_encode($data);
			}
			$row=$stmt->fetch();
			
			// verify password
			$hash = $row['password'];
			if (password_verify($post->password, $hash))
			{
				$payload = new stdClass();
				$payload->id = $row['id'];
				try{
					$token = $jwt->encode($payload, SECRET_SERVER_KEY);
				}
				catch(Exception  $e){
					$data = new stdClass();
					$data->result = false;
					$data->messages[] = "Invalid token format";
					return json_encode($data);
				}
				
				
				$user = new stdClass();
				$user->token = $token;
				$user->username = $row['username'];
				$user->email = $row['email'];
				
				$data = new stdClass();
				$data->token = $token;
				$data->user = $user;
				$data->result = true;
				$data->messages[] = "Login successful";
				return json_encode($data);
			}
			else
			{			
				$data = new stdClass();
				$data->result = false;
				$data->messages[] = "Wrong username and/or password";
				return json_encode($data);
			}
		}
	}
?>