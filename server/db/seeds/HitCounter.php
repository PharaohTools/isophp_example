<?php


use Phinx\Seed\AbstractSeed;

class HitCounter extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $script = file_get_contents(getcwd() . '/db/sqls/hitcounter.sql');
        $this->execute($script);
    }
}
