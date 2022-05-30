<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Cartgeek extends CI_Controller
{
    public function file_check($str)
    {
        $allowed_mime_type_arr = [
            "image/jpg",
            "image/gif",
            "image/jpeg",
            "image/pjpeg",
            "image/png",
            "image/x-png",
        ];
        $mime = get_mime_by_extension($_FILES["product_image"]["name"]);
        if (
            isset($_FILES["product_image"]["name"]) &&
            $_FILES["product_image"]["name"] != ""
        ) {
            if (in_array($mime, $allowed_mime_type_arr)) {
                return true;
            } else {
                $this->form_validation->set_message(
                    "file_check",
                    "Please select only jpeg/gif/jpg/png file."
                );
                return false;
            }
        } else {
            $this->form_validation->set_message(
                "file_check",
                "Please choose a file to upload."
            );
            return false;
        }
    }

    function create()
    {
        // validation purpose

        $this->form_validation->set_rules(
            "product_image",
            "Please upload  Image   only",
            "callback_file_check"
        );

        $this->form_validation->set_rules(
            "product_name",
            "Please Enter Product Name ",
            "trim|required"
        );

        $this->form_validation->set_rules(
            "product_description",
            "Please Enter Product Quantity ",
            "trim|required"
        );
        $this->form_validation->set_rules(
            "product_price",
            "Please Enter Product Price ",
            "trim|required"
        );

        if ($this->form_validation->run() == false) {
            /// show  if validation fails

            $this->load->view("header");
            $this->load->view("product/product_add");
            $this->load->view("footer"); /// addition of the  logo folder
        }
        // show if validation passes
        else {
            $formArray = [];
            $formArray["product_image"] = $_FILES["product_image"]["name"];

            $product_name = $this->input->post("product_name");

            $formArray["product_name"] = ucwords($product_name);

            date_default_timezone_set("Asia/Calcutta");
            $formArray["created_on"] = date("d-m-y H:i:s");
            $formArray["product_price"] = $this->input->post("product_price");
            $product_description = $this->input->post("product_description");
            $formArray["product_description"] = ucfirst($product_description);

            // for image
            $config["upload_path"] = "./assets/product/";
            $config["allowed_types"] = "gif|jpg|png|jpeg";
            $config["max_size"] = 200000000;
            $config["max_width"] = 15000;
            $config["max_height"] = 15000;

            $this->load->library("upload", $config); // uploading library called upload
            if (!$this->upload->do_upload("product_image")) {
                $error = [
                    "error" => $this->upload->display_errors(),
                ];
                $this->load->view("header");
                $this->load->view("product/product_add", $error);
                $this->load->view("footer");
            } else {
                $data = [
                    "image_metadata" => $this->upload->data(),
                ];
            }

            $formArray = $this->security->xss_clean($formArray); // xss clean
            $this->cartgeek_model->create($formArray); // now we can use user model and pass array into it
            $this->session->set_flashdata(
                "success",
                "Record Inserted Successfully"
            );

            redirect(base_url() . "cartgeek/list");
        }
    }
    // end of create  controller

    function list()
    {
        // This controlller shall display list

        $this->load->library("pagination");
        $config["base_url"] = base_url("cartgeek/list");
        $config["per_page"] = 6;
        $config["total_rows"] = $this->cartgeek_model->row_count();

        $config["full_tag_open"] = "<ul class ='pagination'>";
        $config["full_tag_close"] = "</ul>";
        $config["next_tag_open"] = "<li class='page-item-disable'>";
        $config["next_tag_close"] = "</li>";
        $config["prev_tag_open"] = "<li class='page-item'>";
        $config["prev_tag_close"] = "</li>";
        $config["num_tag_open"] = "<li class='page-item'>";
        $config["num_tag_close"] = "</li>";
        $config["cur_tag_open"] =
            "<li class='page-item active'><a class='page-link'>";
        $config["cur_tag_close"] = "<span class='sr-only'></span></a></li>";
        $config["attributes"] = ["class" => "page-link"];
        $this->pagination->initialize($config);

        $result = $this->cartgeek_model->display(
            $config["per_page"],
            $this->uri->segment(3)
        ); // call display method written inside User_model.php  file
        $data = []; // initialise valiable
        $data["result"] = $result;

        $this->load->view("header");
        $this->load->view("product/product_list", $data);
        $this->load->view("footer");
    }

    function delete($product_id)
    {
        ///deletion of records

        $id = $this->input->get("product_id");

        $response = $this->cartgeek_model->delete($product_id);
        if ($response == true) {
            $this->session->set_flashdata(
                "success",
                "Record Deleted Successfully"
            );

            redirect(base_url() . "cartgeek/list");
        } else {
            $this->session->set_flashdata("failure", "Record Not Found ! ");

            redirect(base_url() . "cartgeek/list");
        }
    }

    // end of deletion function controller

    public function __construct()
    {
        // contructor load

        parent::__construct();
    }

    function edit($product_id)
    {
        // edit controller

        $result = $this->cartgeek_model->get($product_id); // access get_logo  function

        $data = []; // initialise valiable
        $data["result"] = $result;

        $this->form_validation->set_rules(
            "product_image",
            "Please upload  Image   only",
            "callback_file_check"
        );

        $this->form_validation->set_rules(
            "product_name",
            "Please Enter Product Name ",
            "trim|required"
        );

        $this->form_validation->set_rules(
            "product_description",
            "Please Enter Product Quantity ",
            "trim|required"
        );
        $this->form_validation->set_rules(
            "product_price",
            "Please Enter Product Price ",
            "trim|required"
        );

        if ($this->form_validation->run() == false) {
            $this->load->view("header");
            $this->load->view("product/product_edit", $data);
            $this->load->view("footer");
        } else {
            $formArray = [];

            $formArray["product_image"] = $_FILES["product_image"]["name"];

            $product_name = $this->input->post("product_name");

            $formArray["product_name"] = ucwords($product_name);

            date_default_timezone_set("Asia/Calcutta");
            $formArray["updated_on"] = date("d-m-y H:i:s");
            $formArray["product_price"] = $this->input->post("product_price");
            $product_description = $this->input->post("product_description");
            $formArray["product_description"] = ucfirst($product_description);

            // for image

            $config["upload_path"] = "./assets/product/";
            $config["allowed_types"] = "gif|jpg|png|jpeg";
            $config["max_size"] = 200000000;
            $config["max_width"] = 15000;
            $config["max_height"] = 15000;

            $this->load->library("upload", $config); // uploading library called upload
            if (!$this->upload->do_upload("product_image")) {
                $error = [
                    "error" => $this->upload->display_errors(),
                ];
                $this->load->view("header");
                $this->load->view("product/product_edit", $error);
                $this->load->view("footer");
            } else {
                $data = [
                    "image_metadata" => $this->upload->data(),
                ];
            }

            $formArray = $this->security->xss_clean($formArray); // xss clean
            $this->cartgeek_model->update($product_id, $formArray); // Model folder has update_act ()
            $this->session->set_flashdata(
                "success",
                "Record Updated  Successfully"
            );

            redirect(base_url() . "cartgeek/list");
        }
    }

    public function index()
    {
        $this->load->view("header");
        $this->load->view("product/product_add");
        $this->load->view("footer");
    }
}
