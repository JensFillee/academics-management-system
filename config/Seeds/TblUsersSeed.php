<?php
declare(strict_types=1);

use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;

/**
 * TblUsers seed.
 */
class TblUsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $hash = new DefaultPasswordHasher();
        $data = [
            "name" => "Jens Fillée",
            "email" => "jens.fillee@admin.com",
            "phone_no" => "0454129817",
            "password" => $hash->hash("admin@123")
        ];

        $table = $this->table('tbl_users');
        $table->insert($data)->save();
    }
}
