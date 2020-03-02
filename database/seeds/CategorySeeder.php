<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $CategoryName = array ('Topi','Atasan','Bawahan','Celana','Kerudung','Hoodie','Gamis');
        // for ($i=0; $i<=13; $i++)
        // {
        // 	$cat = new Category;
        // 	$cat->CategoryName = 
        // }

        DB::table('categories')->insert([
        	['CategoryName' => 'Topi' ,'Description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum temporibus neque numquam officiis, ut incidunt? Laudantium modi, dignissimos itaque illum similique necessitatibus nisi. Sequi ducimus reprehender'],
			['CategoryName' => 'Atasan' ,'Description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo distinctio, aspernatur temporibus tempora eos soluta fugit quas obcaecati cupiditate tempore nihil, excepturi dolorum quaerat, quasi c'],
			['CategoryName' => 'Bawahan' ,'Description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam officiis esse dolorum, ducimus assumenda ut dolore quibusdam harum? Asperiores doloremque, eos sequi reprehenderit quibusdam adipisci'],
			['CategoryName' => 'Celana' ,'Description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore architecto nemo maxime libero recusandae unde veniam ratione et reprehenderit dolores excepturi ullam autem perspiciatis in'],
			['CategoryName' => 'Kerudung' ,'Description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum deserunt, delectus dolorem repellat natus dicta molestias, a culpa impedit et numquam esse distinctio! '],
			['CategoryName' => 'Hoodie' ,'Description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum magnam perspiciatis, commodi nemo veniam eos? Facilis dolores dolore pariatur cum modi officia placeat, doloremque atque archi'],
			['CategoryName' => 'Gamis' ,'Description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis nisi quidem autem molestias ea, atque dolorem iste suscipit libero facere. Hic nemo labore, nam eius conse'],



        ]);
    }
}
