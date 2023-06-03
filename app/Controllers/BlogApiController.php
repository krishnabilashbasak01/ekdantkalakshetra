<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\PostCategoryModel;
use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\Request;

class BlogApiController extends BaseController
{
    public function __construct()
    {

        // $this->db = db_connect();
    }

    public function index()
    {

        $blogsModel = new BlogModel();

        $blogs = $blogsModel->findAll();

        return $this->response->setJSON($blogs);
        // return $this->respond(["message" => 'Something wrong to save answer']);
    }

    public function create()
    {
        header("Access-Control-Allow-Origin: *");
        $jsonData = $this->request->getBody();
        $data = json_decode($jsonData);
        if ($data) {
            $blogsModel = new BlogModel();
            extract((array) $data);

            $raw_data = [
                'post_title' => $post_title,
                'post_slug' => $post_slug,
                'post_meta_desc' => $short_desc,
                'post_thumbnail' => $blog_poster,
                'post_content' => $article_body,
                'post_categories' => $site_blog_categories,
                'post_author_user_name' => 'admin22',
                'post_author_name' => $author_name,
                'post_meta_keywords' => $post_meta_keywords,
                // 'views',
                'status' => 'published'
            ];
            $id = $blogsModel->insert($raw_data);

            return $this->response->setJSON(["success" => true, 'blog_url' => '/blog/'.$post_slug]);
        } else {
            return $this->response->setJSON(["error" => true]);
        }
    }
    public function edit()
    {
        header("Access-Control-Allow-Origin: *");
        $jsonData = $this->request->getBody();
        $data = json_decode($jsonData);
        $blogsModel = new BlogModel();
        extract((array) $data);
        $blog = $blogsModel->where('post_slug', $post_slug)->first();
        if ($blog) {
            $raw_data = [
                'post_title' => $post_title,
                'post_meta_desc' => $short_desc,
                'post_thumbnail' => $blog_poster,
                'post_content' => $article_body,
                'post_categories' => $post_categories,
                'post_author_user_name' => 'admin22',
                'post_author_name' => $author_name,
                'post_meta_keywords' => $post_meta_keywords,
            ];
            $blogsModel->update($blog['post_id'], $raw_data);

            return $this->response->setJSON(["success" => true, 'blog_url' => '/blog/'.$post_slug]);
        }else{
            return $this->response->setJSON(["error" => true]);
        }
    }
    public function delete()
    {
        header("Access-Control-Allow-Origin: *");
        $jsonData = $this->request->getBody();
        $data = json_decode($jsonData);
        $blogsModel = new BlogModel();
        extract((array) $data);
        if (isset($blog_slug) && $blog_slug) {
            $blog = $blogsModel->where('post_slug', $blog_slug)->first();
            $deleted = $blogsModel->delete($blog['post_id']);
            return $this->response->setJSON(["success" => true]);
        } else {
            return $this->response->setJSON(["error" => true]);
        }
        
    }
    public function PictureUpload()
    {
        header("Access-Control-Allow-Origin: *");
        if ($this->request->getMethod() == "post") {
            helper(['form', 'url']);
            $imageFile = $this->request->getFile('picture');
            if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                $allowedExtensions = ['jpg', 'jpeg'];
                $extension = $imageFile->getExtension();

                if (in_array($extension, $allowedExtensions)) {
                    $newName = $imageFile->getRandomName();
                    $imageFile->move('./assets/uploads/', $newName);

                    return $this->response->setJSON([
                        "url" => env('app.baseURL') . 'assets/uploads/' . $newName,
                        "blog_poster" => $newName,
                        'success' => true
                    ]);
                } else {
                    return $this->response->setJSON(["error" => 'Picture type Not supported']);
                }
            } else {
                return $this->response->setJSON(["error" => 'Picture Not Found']);
            }
        }
    }

    public function Categories(){
        header("Access-Control-Allow-Origin: *");
        $categoryModel = new PostCategoryModel();
        $categories = $categoryModel->findAll();
        return $this->response->setJSON([
            'categories' => $categories,
            'success' => true
        ]);
    }
}
