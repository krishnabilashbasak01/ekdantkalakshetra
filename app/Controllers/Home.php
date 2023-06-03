<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\AddressModel;
use App\Models\BlogModel;
use App\Models\CartModel;
use App\Models\GalleryImageModel;
use App\Models\GallerySectionModel;
use App\Models\GalleryVideoModel;
use App\Models\OrderAddressModel;
use App\Models\OrderItemsModel;
use App\Models\OrderModel;
use App\Models\PostCommentsModel;
use App\Models\ProductExtraImageModel;
use App\Models\ProductModel;
use App\Models\ProductReviewsModel;
use App\Models\TestimonialModel;
use App\Models\UserAuthModel;

class Home extends BaseController
{
    use ResponseTrait;
    protected $websiteName;
    public function __construct()
    {

        $this->db = db_connect();
        $this->websiteName = env('website');
    }
    public function index()
    {
        $blogsModel = new BlogModel();
        $blogs = $blogsModel->where('status', 'published')->findAll(3);

        $testimonialModel = new TestimonialModel();
        $testimonials = $testimonialModel->findAll(9);

        $productModel = new ProductModel();
        $products = $productModel->findAll(0, 12);
        $recent_products = $this->db->query("SELECT * FROM `books` ORDER BY `product_id` DESC LIMIT 12");
        $recent_blogs = $this->db->query("SELECT * FROM `posts` ORDER BY `post_id` DESC LIMIT 4");
        $data['pageTitle'] = $this->websiteName;
        $data['recent_products'] = $recent_products->getResult();
        $data['recent_blogs'] = $recent_blogs->getResult();
        $data['products'] = $products;
        $data['blogs'] = $blogs;
        $data['testimonials'] = $testimonials;
        return view('client/home', $data);
    }

    public function signIn()
    {
        $authModel = new UserAuthModel();
        $data['pageTitle'] = "LOGIN OR SIGN UP | ".$this->websiteName;
        if ($this->request->getMethod('POST')) {
            helper(['form', 'url']);
            $validation = \Config\Services::validation();
            $check = $this->validate([
                'name' => 'required',
                'email' => 'required|is_unique[users.email]',
                'password' => 'required',
                're_type_password' => 'required|matches[password]',
            ]);
            if (!$check) {
            } else {
                extract((array) $_POST);
                $s_data = [
                    'name' => $name,
                    'email' => $email,
                    'password' => md5($password)
                ];
                $authModel->insert($s_data);
                $data['message'] = "Your account registered success";
            }
        }

        if ($this->request->getMethod('GET')) {
            helper(['form', 'url']);
            $session = session();

            $email = $this->request->getVar('email');
            if ($email) {
                $result = $authModel->where('email', $email)->first();
                if ($result == null) {
                    $data['err_message'] = "Please check your email is correct";
                } else {
                    if ($result['password'] == md5($this->request->getVar("password"))) {
                        $session->set('name', $result['name']);
                        $session->set('isLogIn', true);
                        $session->set('email', $result['email']);
                        return redirect()->to('/');
                    }
                }
            }
        }


        return view('client/sign-in', $data);
    }

    public function contact()
    {
        $data['pageTitle'] = "Contact Us | " .$this->websiteName;
        return view('client/contact-us', $data);
    }

    public function blogs()
    {
        $data['pageTitle'] = "Blogs | ".$this->websiteName;
        $blogModel = new BlogModel();

        $blogs = $blogModel->findAll();
        $data['blogs'] = $blogs;
        return view('client/blogs', $data);
    }

    public function blog(string $slug)
    {
        $blogModel = new BlogModel();
        $commentModel = new PostCommentsModel();
        $blog =  $blogModel->where('post_slug', $slug)->find();



        if ($this->request->getMethod() == "post") {
            helper(['form', 'url']);
            $raw_data = [

                'post_slug' => $slug,
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'comment' => $this->request->getVar('comment'),
            ];
            $comment_id = $commentModel->insert($raw_data);
        }
        $comments = $commentModel->where('post_slug', $blog[0]['post_slug'])->findAll();
        $data['pageTitle'] = "Blog | ".$this->websiteName;
        $data['blog'] = $blog[0];
        $data['comments'] = $comments;
        return view('client/blog', $data);
    }

   
    public function about()
    {
        $data['pageTitle'] = "About us | ".$this->websiteName;
        return view('client/about', $data);
    }
    public function advisors()
    {
        $data['pageTitle'] = "Advisors| ".$this->websiteName;
        return view('client/advisors', $data);
    }
    public function faculties()
    {
        $data['pageTitle'] = "Faculties | ".$this->websiteName;
        return view('client/facultys', $data);
    }
    public function courses()
    {
        $data['pageTitle'] = "Courses | ".$this->websiteName;
        return view('client/courses', $data);
    }
    public function testimonials()
    {
        $data['pageTitle'] = "Testimonials | ".$this->websiteName;
        $testimonialModel = new TestimonialModel();
        $testimonials = $testimonialModel->findAll();
        $data['testimonials'] = $testimonials;
        return view('client/testimonials', $data);
    }
    public function recordings()
    {
        $data['pageTitle'] = "Recordings | ".$this->websiteName;
        return view('client/recordings', $data);
    }
    public function albumReleases()
    {
        $data['pageTitle'] = "Album Releases | ".$this->websiteName;
        return view('client/album-releases', $data);
    }

    public function annualDays()
    {
        $data['pageTitle'] = "Annual Releases | ".$this->websiteName;
        return view('client/annual-days', $data);
    }

    public function facultySoma()
    {
        $data['pageTitle'] = "Soma Bhattacharyya | ".$this->websiteName;
        return view('client/faculty-soma', $data);
    }

    public function facultySharmistha()
    {
        $data['pageTitle'] = "Sharmistha Adak | ".$this->websiteName;
        return view('client/faculty-sarmistha', $data);
    }
    public function facultyHhemantKhawalia()
    {
        $data['pageTitle'] = "Hhemant Khawalia | ".$this->websiteName;
        return view('client/faculty-hemant', $data);
    }
    public function swarohi()
    {
        $data['pageTitle'] = "Hhemant Khawalia | ".$this->websiteName;
        return view('client/swarohi', $data);
    }



    //    logout
    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to('/');
    }
}
