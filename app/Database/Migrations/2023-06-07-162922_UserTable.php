<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserTable extends Migration
{
    public function up()
    {
        // Make field for table user
        $this->forge->addField([
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'id_asisten' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            // Password encrypted with MD5
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
            ],
            'level' => [
                'type' => 'ENUM',
                'constraint' => ['admin', 'user'],
                'default' => 'user',
            ],
        ]);

        // Add primary key

        $this->forge->addKey('id_user', true);

        // Add foreign key
        $this->forge->addForeignKey('id_asisten', 'tb_asisten', 'id_asisten', 'CASCADE', 'CASCADE');

        // Create table user
        $this->forge->createTable('tb_user');

        // Call addTrigger() function
        $this->addTrigger();
    }

    // Add trigger
    public function addTrigger()
    {
        $this->db->query('CREATE TRIGGER tambah_user AFTER INSERT ON tb_asisten
        FOR EACH ROW
        BEGIN
            DECLARE level_val VARCHAR(50);
            DECLARE password_val VARCHAR(32);
        
            IF NEW.jabatan IN (\'Koordinator\', \'Administrator\') THEN
                SET level_val = \'admin\';
            ELSE
                SET level_val = \'user\';
            END IF;
        
            SET password_val = MD5(NEW.nim);
        
            INSERT INTO tb_user (username, password, level, id_asisten)
            VALUES (NEW.nim, password_val, level_val, NEW.id_asisten);
        END');

        // Create trigger update when update jabatan
        $this->db->query('CREATE TRIGGER update_user AFTER UPDATE ON tb_asisten
        FOR EACH ROW
        BEGIN
            DECLARE level_val VARCHAR(50);
        
            IF NEW.jabatan IN (\'Koordinator\', \'Administrator\') THEN
                SET level_val = \'admin\';
            ELSE
                SET level_val = \'user\';
            END IF;
        
            UPDATE tb_user
            SET level = level_val
            WHERE id_asisten = NEW.id_asisten;
        END');
    }

    public function down()
    {
        // Drop table user
        $this->forge->dropTable('tb_user');
    }
}
