<?php

namespace App\Controllers;

use App\Filters\Auth;
use App\Models\AdminAuthModel;
use App\Models\BlogModel;
use App\Models\GalleryImageModel;
use App\Models\GallerySectionModel;
use App\Models\GalleryVideoModel;
use App\Models\OrderAddressModel;
use App\Models\OrderItemsModel;
use App\Models\OrderModel;
use App\Models\PostCategoryModel;
use App\Models\ProductExtraImageModel;
use App\Models\ProductModel;
use App\Models\ProductReviewsModel;
use App\Models\TestimonialModel;
use CodeIgniter\HTTP\Request;

class Admin extends BaseController
{
    public function __construct()
    {

        $this->db = db_connect();
    }
    public function index()
    {
        $data['pageTitle'] = "Dashboard";
        return view('admin/index', $data);
    }

    public function signIn()
    {

        $data['pageTitle'] = "Sign In";
        $session = session();
        if ($session->has('isLoggedIn') && $session->get('isLoggedIn')) {
            return redirect()->to('admin/');
        } else {
            if ($this->request->getMethod() == "post") {
                helper(['form', 'url']);
                $authModel = new AdminAuthModel();
                $email = $this->request->getVar('email');
                $result = $authModel->where('email', $email)->first();
                if ($result == null) {
                    $result = $authModel->where('user_name', $email)->first();
                    if ($result != null) {
                        if ($result['password'] == md5($this->request->getVar("password"))) {
                            // login
                            $session->set('name', $result['name']);
                            $session->set('isLoggedIn', true);
                            $session->set('user_name', $result['user_name']);
                            $session->set('user_type', $result['user_type']);
                            $data['pageTitle'] = "Admin | " . $result['name'];
                            return redirect()->to('admin/');
                        }
                    } else {
                        $data['err_message'] = "Please check your email or user_name is correct";
                    }
                } else {
                    if ($result['password'] == md5($this->request->getVar("password"))) {
                        $session->set('name', $result['name']);
                        $session->set('isLoggedIn', true);
                        $session->set('user_name', $result['user_name']);
                        $session->set('user_type', $result['user_type']);
                        $data['pageTitle'] = "Admin | " . $result['name'];
                        return redirect()->to('admin/');
                    }
                }
            } else {
                return view('admin/sign-in', $data);
            }
        }
        return view('admin/sign-in', $data);
    }

    public function signUp()
    {
        $data['pageTitle'] = "Sign Up";

        $session = session();
        if ($session->has('login') && $session->get('login')) {
            return view('admin/index', $data);
        } else {
            if ($this->request->getMethod() == "post") {
                helper(['form', 'url']);

                $validation = \Config\Services::validation();
                $check = $this->validate([
                    'user_name' => 'required|is_unique[users.user_name]',
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'email' => 'required|is_unique[users.email]',
                    'password' => 'required',
                    'confirm_password' => 'required|matches[password]',

                ]);
                if (!$check) {
                    return view('admin/sign-up', ['validation' => $this->validator]);
                } else {
                    $model = new AdminAuthModel();
                    extract($_POST);
                    $s_data = [
                        'user_name' => $user_name,
                        'name' => $first_name . " " . $last_name,
                        'email' => $email,
                        'password' => md5($password),
                        'user_type' => "author",
                    ];

                    $model->insert($s_data);

                    $data['message'] = "Your account registered success";
                    return view('admin/sign-up', $data);
                }
            } else {
                return view('admin/sign-up', $data);
            }
        }
    }


    public function blogCategory()
    {
        $data['pageTitle'] = "Blog Category";
        $model = new PostCategoryModel();
        $categories = $model->findAll();
        if ($this->request->getMethod() == "post") {
            helper(['form', 'url']);
            extract($_POST);
            $validation = \Config\Services::validation();
            $check = $this->validate([
                'category' => 'required|is_unique[post_categories.category]',

            ]);
            $c_data = [
                'category' => $category
            ];
            if ($check) {

                $model->insert($c_data);
                $data['success_message'] = "Your account registered success";
            }
            $categories = $model->findAll();
            $data['categories'] = $categories;
            return view('admin/blog-category', $data);
        } else {
            $categories = $model->findAll();
            $data['categories'] = $categories;
            return view('admin/blog-category', $data);
        }
    }

    public function deleteBlogCategory(int $id)
    {
        $model = new PostCategoryModel();
        $model->delete($id);
        return redirect()->back();
    }

    public function blogs()
    {
        $data['pageTitle'] = "Blog List";
        $model = new BlogModel();
        $blogs = $model->findAll();
        $data['blogs'] = $blogs;
        return view('admin/blog-list', $data);
    }

    public function createBlog()
    {
        $session = session();
        $post_author_name = $session->get('name');
        $post_author_user_name = $session->get('user_name');
        $data['pageTitle'] = "Blog Create";
        $categoryModel = new PostCategoryModel();
        $categories = $categoryModel->findAll();
        $data['categories'] = $categories;
        if ($this->request->getMethod() == "post") {
            $model = new BlogModel();
            helper(['form', 'url']);
            // extract($_POST);
            $imageFile = $this->request->getFile('thumbnail');
            $imageFile->move('./assets/uploads/');

            $raw_data = [
                'status' => $this->request->getVar('status'),
                'post_title' => $this->request->getVar('post_title'),
                'post_slug' => $this->request->getVar('post_slug'),
                'post_meta_desc' => $this->request->getVar('short_desc'),
                'post_thumbnail' => $imageFile->getName(),
                'post_content' => $this->request->getVar('article_body'),
                'post_categories' => $this->request->getVar('post_categories'),
                'post_author_user_name' => $post_author_user_name,
                'post_author_name' => $post_author_name,
                'post_meta_keywords' => $this->request->getVar('post_meta_keywords'),
            ];

            $post_id = $model->insert($raw_data);
            $data['post_id'] = $post_id;
            $data['success_message'] = "Your account registered success";
            return view('admin/create-blog', $data);
        }
        return view('admin/create-blog', $data);
    }
    public function deleteblog(int $id)
    {
        $model = new BlogModel();
        $deleted = $model->delete($id);
        return redirect()->back();
    }

    public function editBlog(int $id)
    {
        $data['pageTitle'] = "Edit Blog";
        $model = new BlogModel();
        if ($this->request->getMethod() == "post") {
            helper(['form', 'url']);
            $raw_data = [
                'status' => $this->request->getVar('status'),
                'post_title' => $this->request->getVar('post_title'),
                'post_slug' => $this->request->getVar('post_slug'),
                'post_meta_desc' => $this->request->getVar('short_desc'),
                'post_content' => $this->request->getVar('article_body'),
                'post_meta_keywords' => $this->request->getVar('post_meta_keywords'),
            ];

            $model->update($id, $raw_data);
            $blog = $model->find($id);
            $data['blog'] = $blog;
            return view('admin/edit-blog', $data);
        }
        $blog = $model->find($id);
        $data['blog'] = $blog;
        return view('admin/edit-blog', $data);
    }

    public function testimonials(){
        $data['pageTitle'] = "Testimonial";
        
        $testimonial = new TestimonialModel();

        if ($this->request->getMethod() == "post") {
            helper(['form', 'url']);
            $imageFile = $this->request->getFile('user_picture');
            $imageFile->move('./assets/uploads/');

            $raw_data = [
                'name' => $this->request->getVar('name'),
                'user_type' => $this->request->getVar('user_type'),
                'user_picture' => $imageFile->getRandomName(),
                'testimonial' => $this->request->getVar('testimonial'),
            ];

            $id = $testimonial->insert($raw_data);
            $data['success_message'] = "Testimonial upload success";
        }
        $testimonials = $testimonial->findAll();
        $data['testimonials'] = $testimonials;
        return view('admin/testimonials', $data);
    }

    //    logout
    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to('admin/sign-in');
    }
}
