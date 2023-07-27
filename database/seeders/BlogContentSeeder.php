<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blogs')->insert([
            'program_name_id'=>1,
            'Program_name'=>'Example 1: Java if Statement',
            'code'=>'<h5>class IfStatement {<br>&nbsp; public static void main(String[] args) {<br>&nbsp; &nbsp; int number = 10;<br>&nbsp; &nbsp; // checks if number is less than 0<br>&nbsp; &nbsp; if (number &lt; 0) {<br>&nbsp; &nbsp; &nbsp; System.out.println("The number is negative.");<br>&nbsp; &nbsp; }<br>&nbsp; &nbsp; System.out.println("Statement outside if block");<br>&nbsp; }<br>}</h5>',
            'output'=>'<p>Statement outside if block<br></p>',
            'explain'=>'<p style="margin-bottom: 16px; padding: 0px; color: rgba(37, 38, 94, 0.7); font-size: 18px; line-height: 30px; font-family: euclid_circular_a, Arial, &quot;Source Sans Pro&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; background-color: rgb(249, 250, 252);">In the program,&nbsp;<code style="margin: 0px 2px; padding-top: 0px; padding-bottom: 0px; font-family: &quot;Droid Sans Mono&quot;, Inconsolata, Menlo, Consolas, &quot;Bitstream Vera Sans Mono&quot;, Courier, monospace; font-size: 14px; border: 1px solid rgb(211, 220, 230); display: inline-block; line-height: 20px;">number &lt; 0</code>&nbsp;is&nbsp;<code style="margin: 0px 2px; padding-top: 0px; padding-bottom: 0px; font-family: &quot;Droid Sans Mono&quot;, Inconsolata, Menlo, Consolas, &quot;Bitstream Vera Sans Mono&quot;, Courier, monospace; font-size: 14px; border: 1px solid rgb(211, 220, 230); display: inline-block; line-height: 20px;">false</code>. Hence, the code inside the body of the&nbsp;<code style="margin: 0px 2px; padding-top: 0px; padding-bottom: 0px; font-family: &quot;Droid Sans Mono&quot;, Inconsolata, Menlo, Consolas, &quot;Bitstream Vera Sans Mono&quot;, Courier, monospace; font-size: 14px; border: 1px solid rgb(211, 220, 230); display: inline-block; line-height: 20px;">if</code>&nbsp;statement is&nbsp;<span style="margin: 0px; padding: 0px; font-weight: bolder;">skipped</span>.</p><div><br></div>',
        ]);
        // DB::table('blogs')->insert([
        //     'program_name'=>'Python',
        //     'slug_name'=>'python',
        //     'image'=>'1690010220.png',
        // ]);
        // DB::table('blogs')->insert([
        //     'program_name'=>'C++',
        //     'slug_name'=>'c++',
        //     'image'=>'1690008760.png
        //     ',
        // ]);
    }
}
