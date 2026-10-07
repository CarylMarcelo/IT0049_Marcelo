<?php
namespace App\Models;
use CodeIgniter\Model;
class User extends Model
{
protected $table = 'user_accounts';
protected $primaryKey = 'id';
protected $useAutoIncrement = true;
protected $returnType = 'array';
protected $useSoftDeletes = false;
protected $protectFields = true;
protected $allowedFields = [
    'username',
    'password'
];
protected bool $allowEmptyInserts = false;
protected bool $updateOnlyChanged = true;

protected array $castHandlers = [];

protected $validationMessages = [
'email' => [
'is_unique' => 'This email address is already registered.'
],
'password' => [
'min_length' => 'Password must be at least 8 characters long.'
]
];
protected $skipValidation = false;
protected $cleanValidationRules = true;
// Callbacks
protected $allowCallbacks = true;
protected $beforeInsert = ['hashPassword'];
protected $afterInsert = [];
protected $beforeUpdate = ['hashPassword'];
protected $afterUpdate = [];
protected $beforeFind = [];
protected $afterFind = [];
protected $beforeDelete = [];
protected $afterDelete = [];
protected function hashPassword(array $data)
{
if (isset($data['data']['password'])) {
$data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
}
return $data;
}
public function verifyPassword($password, $hash)
{
return password_verify($password, $hash);
}
public function findByEmail($email)
{
return $this->where('email', $email)->first();
}
}