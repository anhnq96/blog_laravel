<?php
/**
 * Created by PhpStorm.
 * User: macintosh
 * Date: 2019-05-01
 * Time: 09:40
 */

namespace App\Repositories\Post;


interface PostRepositoryInterface
{
    public function all();
    public function find($id);
}
