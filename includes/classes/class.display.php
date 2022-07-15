<?php
class CRT_ADMIN_DISPLAY {
    
  
  /*function DisplayMeasurement() {

        $data = '';
        $where = 'where a.is_delete="n"';
        $result = $GLOBALS['db']->ExeQuersys("select a.id,a.measurement ,a.unit , GROUP_CONCAT(b.unit) UnitName FROM tbl_measurement a INNER JOIN tbl_unit b ON FIND_IN_SET(b.id, a.unit) > 0 ".$where." GROUP BY a.id");

        while ($row = mysqli_fetch_array($result)) {
            
            $data .='<tr>
                        <td>'.$row['measurement'].'</td>
                        <td>'.$row['UnitName'].'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }
    function DisplayUnit() {

        $data = '';

        $where = 'where is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("select id,unit from tbl_unit ".$where." ORDER BY id DESC");

        while ($row = mysqli_fetch_array($result)) {
          
           $data .='<tr>
                        <td>'.$row['unit'].'</td>
                         <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }
    
    */
    function DisplayShipper() {

        $data = '';

        $where = 'where is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("select id,shipper_code,shipper_name,shipper_short_name,country  from shipper_master " . $where . " order by shipper_code desc");

        while ($row = mysqli_fetch_array($result)) {
            
            
            $data .='<tr>
                        <td class="hide"></td>
                        <td class="text-left">'.$row['shipper_code'].'</td>
                        <td class="text-left">'.$row['shipper_name'].'</td>
                        <td class="text-left">'.$row['shipper_short_name'].'</td>
                        <td class="text-left">'.$row['country'].'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }
    function DisplayUser() {

        $data = '';

        $where = 'where is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("select id,username,email,designation from user_master " . $where . " order by username");

        while ($row = mysqli_fetch_array($result)) {
            
            
            $data .='<tr>
                        <td class="hide"></td>
                        <td class="text-left">'.$row['username'].'</td>
                        <td class="text-left">'.$row['email'].'</td>
                        <td class="text-left">'.$row['designation'].'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }

    function DisplaySupplier() {

        $data = '';

        $where = 'where is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("select id,supplier_code,supplier_name,supplier_short_name,country  from supplier_master " . $where . " order by supplier_code desc");

        while ($row = mysqli_fetch_array($result)) {
            
            
            $data .='<tr>
                        <td class="hide"></td>
                        <td class="text-left">'.$row['supplier_code'].'</td>
                        <td class="text-left">'.$row['supplier_name'].'</td>
                        <td class="text-left">'.$row['supplier_short_name'].'</td>
                        <td class="text-left">'.$row['country'].'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }

    function DisplayLocalSupplier() {

        $data = '';

        $where = 'where is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("select id,supplier_code,supplier_name,supplier_short_name,country  from local_supplier_master " . $where . " order by supplier_code desc");

        while ($row = mysqli_fetch_array($result)) {
            
            
            $data .='<tr>
                        <td class="hide"></td>
                        <td class="text-left">'.$row['supplier_code'].'</td>
                        <td class="text-left">'.$row['supplier_name'].'</td>
                        <td class="text-left">'.$row['supplier_short_name'].'</td>
                        <td class="text-left">'.$row['country'].'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }

    function DisplayStamp() {

        $data = '';

        $where = 'where is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("select id,stamp_image,stamp_name from stamp_master " . $where . " ");

        while ($row = mysqli_fetch_array($result)) {
            
            
            $data .='<tr>
                        <td class="hide"></td>
                        <td class="text-left"><img src="img/upload_image/'.$row['stamp_image'].'" height=50 width=50></td>
                        <td class="text-left">'.$row['stamp_name'].'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }
    function DisplaySalesPerson() {

        $data = '';

        $where = 'where is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("select id,sales_name,sales_designation,sales_email from salesman_master " . $where . " ");

        while ($row = mysqli_fetch_array($result)) {
            
            
            $data .='<tr>
                        <td class="hide"></td>
                        <td class="text-left">'.$row['sales_name'].'</td>
                        <td class="text-left">'.$row['sales_designation'].'</td>
                        <td class="text-left">'.$row['sales_email'].'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }
    function DisplayTechnicalSpecification() {

        $data = '';

        $where = 'where is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("select id, name from  technical_specification " . $where . " ");

        while ($row = mysqli_fetch_array($result)) {
            
            
            $data .='<tr>
                        <td class="hide"></td>
                        <td class="text-left">'.$row['name'].'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }
    function DisplayProduct() {

        $data = '';

        $where = 'where is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("select id, prod_name, prod_code, prod_group from product_master " . $where . " ");

        while ($row = mysqli_fetch_array($result)) {
            
            
            $data .='<tr>
                        <td class="hide"></td>
                        <td class="text-left">'.$row['prod_name'].'</td>
                        <td class="text-left">'.$row['prod_code'].'</td>
                        <td class="text-left">'.$row['prod_group'].'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }

    function DisplayExpense() {

        $data = '';

        $where = 'where em.is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("select em.id, em.expense_name, em.accounting_head, ah.account_head from expense_master as em left join accounting_head as ah on ah.id=em.accounting_head " . $where . " ");


        while ($row = mysqli_fetch_array($result)) {
            
            
            $data .='<tr>
                        <td class="hide"></td>
                        <td class="text-left">'.$row['expense_name'].'</td>
                        <td class="text-left">'.$row['account_head'].'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }


    function DisplayStockCardMaster() {

        $data = '';

        $where = 'where is_delete="n"';
        
        $result = $GLOBALS['db']->ExeQuersys("select id,card_code,card_name,opening_stock,re_order_level from stock_card_master " . $where . " order by card_code");

        while ($row = mysqli_fetch_array($result)) {
            
           
            $data .='<tr>
                        <td class="hide"></td>
                        <td class="text-left">'.$row['card_code'].'</td>
                        <td class="text-left">'.$row['card_name'].'</td>
                        <td class="text-left">'.$row['opening_stock'].'</td>
                        <td class="text-left">'.$row['re_order_level'].'</td>
                        
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }

    function DisplayAccountingHead() {

        $data = '';

        $where = 'where is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("select id, account_head from accounting_head " . $where . " ");

        while ($row = mysqli_fetch_array($result)) {
            
            
            $data .='<tr>
                        <td class="hide"></td>
                        <td class="text-left">'.$row['account_head'].'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }

    function DisplayCustomer() {

        $data = '';
        $where ='where is_delete="n"';
        $result = $GLOBALS['db']->ExeQuersys("select id,company_name,address,city,country,tel,fax,email,website,vat,office_land_mark,sales_man,credit_limit from cus_main " . $where . " ");

        while ($row = mysqli_fetch_array($result)) {
            
           
            $data .='<tr>
                        <td class="hide"></td>
                        <td class="text-left">'.$row['company_name'].'</td>
                        <td class="text-left">'.$row['address'].'</td>
                        <td class="text-left">'.$row['city'].'</td>
                        <td class="text-left">'.$row['country'].'</td>
                        <td class="text-left">'.$row['tel'].'</td>
                        <td class="text-left">'.$row['fax'].'</td>
                        <td class="text-left">'.$row['email'].'</td>
                        <td class="text-left">'.$row['website'].'</td>
                        <td class="text-left">'.$row['vat'].'</td>
                        <td class="text-left">'.$row['office_land_mark'].'</td>
                        <td class="text-left">'.$row['sales_man'].'</td>
                        <td class="text-left">'.$row['credit_limit'].'</td>
                        
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }




     function DisplayCourier() {

        $data = '';
        $where ='where status="0" and is_delete="n"';
        $result = $GLOBALS['db']->ExeQuersys("select id,date,bill_no,company_name,courier_comp from  courier_master " . $where . " ");

        while ($row = mysqli_fetch_array($result)) {
    
        $str = $row['date'];
        $date = date("d-m-Y", strtotime($str));

        $data .='<tr>

                        <td class="hide"></td>
                        <td class="text-left">'.$date.'</td>
                        <td class="text-left">'.$row['bill_no'].'</td>
                        <td class="text-left">'.$row['company_name'].'</td>
                        <td class="text-left">'.$row['courier_comp'].'</td>

                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>

                        </td>
                    </tr>';

        }

        return $data;
    }

   function DisplayCourierOld() {


        $data = '';
        $where ='where status="1" and is_delete="n"';
        $result = $GLOBALS['db']->ExeQuersys("select id,date,bill_no,company_name,courier_comp from  courier_master " . $where . " ");

        while ($row = mysqli_fetch_array($result)) {
            
           
            $str = $row['date'];
            $date = date("d-m-Y", strtotime($str));
            $data .='<tr>

                        <td class="hide"></td>
                        <td class="text-left">'.$date.'</td>
                        <td class="text-left">'.$row['bill_no'].'</td>
                        <td class="text-left">'.$row['company_name'].'</td>
                        <td class="text-left">'.$row['courier_comp'].'</td>

                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'"class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>

                        </td>
                    </tr>';

        }

        return $data;
    }

    function DisplayReceiptVoucher() {

        $data = '';
        $where ='where status="0" and is_delete="n"';
        $result = $GLOBALS['db']->ExeQuersys("select id,rv_no,date,company_name,amnt from rv_master ".$where." ");

        while ($row = mysqli_fetch_array($result)) {

            $sub_rv = substr($row['rv_no'],0,2);
            $sub_rv_no = substr($row['rv_no'],2);
            $rv_no = "RV".$sub_rv."-".$sub_rv_no;

            $str = $row['date'];
            $date = date("d-m-Y", strtotime($str));
            
            $data .='<tr>
                        <td class="hide"></td>
                        <td class="text-left">'.$rv_no.'</td>
                        <td class="text-left">'.$date.'</td>
                        <td class="text-left">'.$row['company_name'].'</td>
                        <td class="text-left">'.$row['amnt'].'</td>

                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }

    function DisplayReceiptVoucherOld() {

        $data = '';
        $where ='where status="1" and is_delete="n"';
        $result = $GLOBALS['db']->ExeQuersys("select id,rv_no,date,company_name,amnt from rv_master ".$where." ");

        while ($row = mysqli_fetch_array($result)) {

            $sub_rv = substr($row['rv_no'],0,2);
            $sub_rv_no = substr($row['rv_no'],2);
            $rv_no = "RV".$sub_rv."-".$sub_rv_no;

            $str = $row['date'];
            $date = date("d-m-Y", strtotime($str));
            
            $data .='<tr>
                        <td class="hide"></td>
                        <td class="text-left">'.$rv_no.'</td>
                        <td class="text-left">'.$date.'</td>
                        <td class="text-left">'.$row['company_name'].'</td>
                        <td class="text-left">'.$row['amnt'].'</td>

                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }

     function DisplayPaymentVoucher() {

        $data = '';
        $where ='where status="0" and is_delete="n"';
        $result = $GLOBALS['db']->ExeQuersys("select id,pv_no,date,paid_to,amnt,vat,grand_total from pv_master ".$where." ");

        while ($row = mysqli_fetch_array($result)) {
            
            $str = $row['date'];
            $date = date("d-m-Y", strtotime($str));

            $data .='<tr>
                        <td class="hide"></td>
                        <td class="text-left">PV-'.$row['pv_no'].'</td>
                        <td class="text-left">'.$date.'</td>
                        <td class="text-left">'.$row['paid_to'].'</td>
                        <td class="text-left">'.$row['amnt'].'</td>
                        <td class="text-left">'.$row['vat'].'</td>
                        <td class="text-left">'.$row['grand_total'].'</td>

                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }


    function DisplayPaymentVoucherOld() {

        $data = '';
        $where ='where status="1" and is_delete="n"';
        $result = $GLOBALS['db']->ExeQuersys("select id,pv_no,date,paid_to,amnt,vat,grand_total from pv_master ".$where." ");

        while ($row = mysqli_fetch_array($result)) {
            
            $str = $row['date'];
            $date = date("d-m-Y", strtotime($str));

            $data .='<tr>
                        <td class="hide"></td>
                        <td class="text-left">PV-'.$row['pv_no'].'</td>
                        <td class="text-left">'.$date.'</td>
                        <td class="text-left">'.$row['paid_to'].'</td>
                        <td class="text-left">'.$row['amnt'].'</td>
                        <td class="text-left">'.$row['vat'].'</td>
                        <td class="text-left">'.$row['grand_total'].'</td>

                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }


     function DisplayProofing() {

        $data = '';
        $where ='where m.status="0" and m.is_delete="n"';
        $result = $GLOBALS['db']->ExeQuersys("select m.id, g.proofing_main_id, g.title from proofing_main_admin as m left join proofing_general_admin as g on m.id=g.proofing_main_id ".$where." ");

        while ($row = mysqli_fetch_array($result)) {           
            $data .='<tr>
                        <td class="hide"></td>
                        
                        <td class="text-left">'.$row['title'].'</td>
                       
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }

     function DisplayProofingOld() {

        $data = '';
         $where ='where m.status="1" and m.is_delete="n"';
        $result = $GLOBALS['db']->ExeQuersys("select m.id, g.proofing_main_id, g.title from proofing_main_admin as m left join proofing_general_admin as g on m.id=g.proofing_main_id ".$where." ");


        while ($row = mysqli_fetch_array($result)) {
            
           
            $data .='<tr>
                        <td class="hide"></td>
                        
                        <td class="text-left">'.$row['title'].'</td>
                       
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }

    // Proofing Tobjee Display Code Start

    function DisplayProofingTobjee() {

        $data = '';
        $where ='where m.status="0" and m.is_delete="n"';
        $result = $GLOBALS['db']->ExeQuersys("select m.id, g.proofing_main_id, g.title from proofing_main_tobjee as m left join proofing_general_tobjee as g on m.id=g.proofing_main_id ".$where." ");

        while ($row = mysqli_fetch_array($result)) {           
            $data .='<tr>
                        <td class="hide"></td>
                        
                        <td class="text-left">'.$row['title'].'</td>
                       
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }


    function DisplayProofingTobjeeOld() {

        $data = '';
        $where ='where m.status="1" and m.is_delete="n"';
        $result = $GLOBALS['db']->ExeQuersys("select m.id, g.proofing_main_id, g.title from proofing_main_tobjee as m left join proofing_general_tobjee as g on m.id=g.proofing_main_id ".$where." ");

        while ($row = mysqli_fetch_array($result)) {           
            $data .='<tr>
                        <td class="hide"></td>
                        
                        <td class="text-left">'.$row['title'].'</td>
                       
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }




    // **********************************


    // Proofing Sales Display Code Start

        function DisplayProofingSales() {

        $data = '';
        $where ='where m.status="0" and m.is_delete="n"';
        $result = $GLOBALS['db']->ExeQuersys("select m.id, g.proofing_main_id, g.title from proofing_main_sales as m left join proofing_general_sales as g on m.id=g.proofing_main_id ".$where." ");

        while ($row = mysqli_fetch_array($result)) {           
            $data .='<tr>
                        <td class="hide"></td>
                        
                        <td class="text-left">'.$row['title'].'</td>
                       
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }


     function DisplayProofingSalesOld() {

        $data = '';
        $where ='where m.status="1" and m.is_delete="n"';
        $result = $GLOBALS['db']->ExeQuersys("select m.id, g.proofing_main_id, g.title from proofing_main_sales as m left join proofing_general_sales as g on m.id=g.proofing_main_id ".$where." ");

        while ($row = mysqli_fetch_array($result)) {           
            $data .='<tr>
                        <td class="hide"></td>
                        
                        <td class="text-left">'.$row['title'].'</td>
                       
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }

    // *****************************


    function DisplayQuotation() {

        $data = '';
        $where ='where q.status="0" and q.is_delete="n"';
        $result = $GLOBALS['db']->ExeQuersys("select q.id,q.in_ref_no,q.customer_name,q.card_name,s.sales_name from quotation_main_admin as q left join salesman_master as s on q.salesman_id = s.id ".$where." ");

        while ($row = mysqli_fetch_array($result)) {

           
            $data .='<tr>
                        <td class="hide"></td>
                        
                        <td class="text-left">DBS/'.$_SESSION['sm'].'/'.$row['in_ref_no'].'</td>
                        <td class="text-left">'.$row['customer_name'].'</td>
                        <td class="text-left">'.$row['card_name'].'</td>
                        <td class="text-left">'.$row['sales_name'].'</td>
                       
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }

     function DisplayQuotationOld() {

        $data = '';
        $where ='where q.status="1" and q.is_delete="n"';
        $result = $GLOBALS['db']->ExeQuersys("select q.id,q.in_ref_no,q.customer_name,q.card_name,s.sales_name from quotation_main_admin as q left join salesman_master as s on q.salesman_id = s.id ".$where." ");

        while ($row = mysqli_fetch_array($result)) {

           
            $data .='<tr>
                        <td class="hide"></td>
                        
                        <td class="text-left">DBS/PT/'.$row['in_ref_no'].'</td>
                        <td class="text-left">'.$row['customer_name'].'</td>
                        <td class="text-left">'.$row['card_name'].'</td>
                        <td class="text-left">'.$row['sales_name'].'</td>
                       
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }

    function DisplayDelivery() {

        $data = '';
        $where ='where status="0" and is_delete="n"';
        $result = $GLOBALS['db']->ExeQuersys("select id,do_no,customer_id,attn,lpo_no,qty_total,box_total From delivery_main ".$where." ");

        while ($row = mysqli_fetch_array($result)) {

           
            $data .='<tr>
                        <td class="hide"></td>
                        
                        <td class="text-left">'.$row['do_no'].'</td>
                        <td class="text-left">'.$row['customer_id'].'</td>
                        <td class="text-left">'.$row['attn'].'</td>
                        <td class="text-left">'.$row['lpo_no'].'</td>
                        <td class="text-left">'.$row['qty_total'].'</td>
                        <td class="text-left">'.$row['box_total'].'</td>

                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }

    function DisplayDeliveryOld() {

        $data = '';
        $where ='where status="1" and is_delete="n"';
        $result = $GLOBALS['db']->ExeQuersys("select id,do_no,customer_id,attn,lpo_no,qty_total,box_total From delivery_main ".$where." ");

        while ($row = mysqli_fetch_array($result)) {

           
            $data .='<tr>
                        <td class="hide"></td>
                        
                        <td class="text-left">'.$row['do_no'].'</td>
                        <td class="text-left">'.$row['customer_id'].'</td>
                        <td class="text-left">'.$row['attn'].'</td>
                        <td class="text-left">'.$row['lpo_no'].'</td>
                        <td class="text-left">'.$row['qty_total'].'</td>
                        <td class="text-left">'.$row['box_total'].'</td>

                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }

    function Displayjobordertobjee() {

        $data = '';
        $where ='where p.status="0" and p.is_delete="n" ';
        $result = $GLOBALS['db']->ExeQuersys("select p.id,p.po_no,p.po_date,p.shipping,
        p.po_so_no,p.card_name,p.qty,p.supplier_id,p.finish_date,p.job_status,p.salesman_id, s.id,s.supplier_name,sa.id,sa.smno From po_master_tobjee as p LEFT JOIN supplier_master as s on p.supplier_id=s.id LEFT JOIN salesman_master as sa on p.salesman_id=sa.id ".$where." ");

        while ($row = mysqli_fetch_array($result)){
                                
         if($row['job_status']=='u') 
            {
                $job_status = 'UP';
            }

           elseif($row['job_status']=='f')
            {
                $job_status = 'Finish';
            }    
           elseif($row['job_status']=='s')
            {
                $job_status = 'Ship';
            }   
           else
            {
                $job_status = 'Inv';
            }      
           
                                
        $data .='<tr>
                        <td class="hide"></td>
                        
                        <td class="text-left">'.'JO'.$row['po_no'].'</td>
                        <td class="text-left">'.$row['po_date'].'</td>
                        <td class="text-left">'.$row['shipping'].'</td>
                        <td class="text-left">'.$row['po_so_no'].'</td>
                        <td class="text-left">'.$row['card_name'].'</td>
                        <td class="text-left">'.$row['qty'].'</td>
                        <td class="text-left">'.$row['supplier_name'].'</td>
                        <td class="text-left">'.$row['finish_date'].'</td>
                        <td class="text-left">'.$job_status.'</td>
                        <td class="text-left">'.$row['smno'].'</td>

                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }


    function Displaysalesreporting() {

        $data = '';
        $where ='where m.status="0" and m.is_delete="n"';
        $result = $GLOBALS['db']->ExeQuersys("select m.id,m.month,m.total,m.total_received,m.status,m.is_delete,s.main_id,s.invoice_status from sales_reporting_sales3_main as m left join sales_reporting_sales3_sub as s on m.id = s.main_id ".$where." ");

        while ($row = mysqli_fetch_array($result)) {
           
            $data .='<tr>
                        <td class="hide"></td>
                        
                        <td class="text-left">'.$row['month'].'</td>
                        <td class="text-left">'.$row['total'].'</td>
                        <td class="text-left">'.$row['total_received'].'</td>
                        <td class="text-left">'.$row['invoice_status'].'</td>

                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }


    function Displaysalesreportingold() {

        $data = '';
        $where ='where m.status="1" and m.is_delete="n"';
        $result = $GLOBALS['db']->ExeQuersys("select m.id,m.month,m.total,m.total_received,m.status,m.is_delete,s.main_id,s.invoice_status from sales_reporting_sales3_main as m left join sales_reporting_sales3_sub as s on m.id = s.main_id ".$where." ");

        while ($row = mysqli_fetch_array($result)) {
           
            $data .='<tr>
                        <td class="hide"></td>
                        
                        <td class="text-left">'.$row['month'].'</td>
                        <td class="text-left">'.$row['total'].'</td>
                        <td class="text-left">'.$row['total_received'].'</td>
                        <td class="text-left">'.$row['invoice_status'].'</td>

                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }


     function Displayjob_summary() {

        $data = '';
        $where ='where status="0" and is_delete="n"';
        $result = $GLOBALS['db']->ExeQuersys("select id,job_no,inv_no,card,customer,supplier from  job_summary_main  ".$where." ");

        while ($row = mysqli_fetch_array($result)) {
           
            $data .='<tr>
                        <td class="hide"></td>
                        
                        <td class="text-left">JO'.$row['job_no'].'</td>
                        <td class="text-left">'.$row['inv_no'].'</td>
                        <td class="text-left">'.$row['card'].'</td>
                        <td class="text-left">'.$row['customer'].'</td>
                        <td class="text-left">'.$row['supplier'].'</td>

                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }

     function Displayicinvoice() {

        $data = '';
        $where ='where status="0" and is_delete="n"';
        $result = $GLOBALS['db']->ExeQuersys("select id,ic_inv_no,inv_date,lpo_no,card_name,total_product_amnt,total_payment_amnt from  ic_invoice_main  ".$where." ");

        while ($row = mysqli_fetch_array($result)) {

            $sub_ic = substr($row['ic_inv_no'],0,2);
            $sub_ic_inv = substr($row['ic_inv_no'],2);
            $inv_no = "DBS/IC/".$sub_ic."-".$sub_ic_inv;
           
            $data .='<tr>
                        <td class="hide"></td>
                        
                        <td class="text-left">'.$inv_no.'</td>
                        <td class="text-left">'.$row['inv_date'].'</td>
                        <td class="text-left">'.$row['lpo_no'].'</td>
                        <td class="text-left">'.$row['card_name'].'</td>
                        <td class="text-left">'.$row['total_product_amnt'].'</td>
                        <td class="text-left">'.$row['total_payment_amnt'].'</td>

                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }

    function Displayicinvoiceold() {

        $data = '';
        $where ='where status="1" and is_delete="n"';
        $result = $GLOBALS['db']->ExeQuersys("select id,ic_inv_no,inv_date,lpo_no,card_name,total_product_amnt,total_payment_amnt from  ic_invoice_main  ".$where." ");

        while ($row = mysqli_fetch_array($result)) {

            $sub_ic = substr($row['ic_inv_no'],0,2);
            $sub_ic_inv = substr($row['ic_inv_no'],2);
            $inv_no = "DBS/IC/".$sub_ic."-".$sub_ic_inv;
           
            $data .='<tr>
                        <td class="hide"></td>
                        
                        <td class="text-left">'.$inv_no.'</td>
                        <td class="text-left">'.$row['inv_date'].'</td>
                        <td class="text-left">'.$row['lpo_no'].'</td>
                        <td class="text-left">'.$row['card_name'].'</td>
                        <td class="text-left">'.$row['total_product_amnt'].'</td>
                        <td class="text-left">'.$row['total_payment_amnt'].'</td>

                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }













    /*   
    function DisplayExpense() {

        $data = '';

        $where = '';

        $result = $GLOBALS['db']->ExeQuersys("select id, expense_name from expense_master" . $where . " ");

        while ($row = mysqli_fetch_array($result)) {
            
            
            $data .='<tr>
                        <td class="hide"></td>
                        <td class="text-left">'.$row['expense_name'].'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }
    function DisplaySite() {

        $data = '';

        $where = '';

        $result = $GLOBALS['db']->ExeQuersys("select id,site_name,site_no,site_status from site " . $where . " order by site_name");

        while ($row = mysqli_fetch_array($result)) {
            
            if($row['site_status']=='a')
            {
                $status="Active";
            }
            else if($row['site_status']=='c')
            {
                $status="Complete";
            }
            $data .='<tr>
                        <td class="hide"></td>
                        <td class="text-left">'.$row['site_name'].'</td>
                        <td class="text-left">'.$row['site_no'].'</td>
                        <td class="text-left">'.$status.'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }
    function DisplayCorrespondenceLogs() {

        $data = '';

        $where = '';

        $result = $GLOBALS['db']->ExeQuersys("select id, company, ref_no, description, received_date, in_out from correspondence_logs " . $where . " order by received_date desc");

        while ($row = mysqli_fetch_array($result)) {
            
            
            $data .='<tr>
                        <td class="hide"></td>
                        <td class="text-left">'.$row['company'].'</td>
                        <td class="text-left">'.$row['ref_no'].'</td>
                        <td class="text-left">'.date('d-m-Y',strtotime($row['received_date'])).'</td>
                        <td class="text-left">'.$row['description'].'</td>
                        <td class="text-left">'.$row['in_out'].'</td>
                        
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }
    function DisplayIns() {

        $data = '';

        $where = 'where is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("select id,ins_name from tbl_ins " . $where . " order by id desc");

        while ($row = mysqli_fetch_array($result)) {
          
           $data .='<tr>
                        <td>'.$row['ins_name'].'</td>
                         <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }
    function DisplayMake() {

        $data = '';

        $where = 'where is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("select id,make_name from tbl_make " . $where . " order by id desc");

        while ($row = mysqli_fetch_array($result)) {
          
           $data .='<tr>
                        <td>'.$row['make_name'].'</td>
                         <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }
    function DisplayInstrumentDoc() {

        $data = '';

        $where = 'where is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("select id,doc_name,description from tbl_instrument_doc " . $where . " order by id desc");

        while ($row = mysqli_fetch_array($result)) {
          
           $data .='<tr>
                        <td>'.$row['doc_name'].'</td>
                        <td>'.$row['description'].'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }
    function DisplayAddresData() {

        $data = '';

        $where = 'where is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("select id,address_data_name from tbl_address_data " . $where . " order by id desc");

        while ($row = mysqli_fetch_array($result)) {
          
           $data .='<tr>
                        <td>'.$row['address_data_name'].'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }
    function DisplayInstrument() {

        $data = '';

        $where = 'where i.is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("select i.id,i.code,i.instrument,i.least_count,i.range_min,i.range_max,i.unit,i.status,ins.id as ins_id,ins.ins_name,u.id as u_id,u.unit FROM tbl_instrument as i LEFT JOIN tbl_ins as ins on i.instrument=ins.id LEFT JOIN tbl_unit as u on i.unit=u.id " . $where . " order by ins.ins_name asc");

        while ($row = mysqli_fetch_array($result)) {
            if ($row['status'] == 's') {
                $status = '<td class="text-center text-aqua">Stock</td>';
            }
            elseif ($row['status'] == 'a') {
                $status = '<td class="text-center text-green">Active</td>';
            }
            else {
                $status = '<td class="text-center text-red">Destroy</td>';
            }
          
           $data .='<tr>
                        <td class="text-left code-font">'.$row['code'].'</td>
                        <td class="text-left">'.$row['ins_name'].'</td>
                        <td class="text-center">'.$row['least_count'].'</td>
                        <td class="text-center">'.$row['range_min'].'</td>
                        <td class="text-center">'.$row['range_max'].'</td>
                        <td class="text-center">'.$row['unit'].'</td>
                        '.$status.'
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';
        }

        return $data;
    }
    function DisplayProject() {

        $data = '';

        $where = 'where p.is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("select p.id,p.customer_id,p.prj_no,p.prj_date,p.status,c.id as cust_id,c.ac_name FROM tbl_project as p LEFT JOIN tbl_account as c on p.customer_id=c.id " . $where . " order by p.prj_date desc ");

        while ($row = mysqli_fetch_array($result)) {
            if ($row['status'] == 'a') {
                $status = '<td class="text-center text-green">Active</td>';
            }
            else {
                $status = '<td class="text-center text-red">Inactive</td>';
            }
          
            $str = $row['prj_date'];
            $prj_date = date("d-m-Y", strtotime($str));
            $date1 = date("Y-m-d", strtotime($str));
          
           $data .='<tr>
                        <td class="hide"></td>
                        <td class="text-left"><a href="project_part_list.php?id='.$row['id'].'">'.$row['prj_no'].'</a></td>
                        <td class="text-left">'.$row['ac_name'].'</td>
                        <td class="text-center" data-order="'.$date1.'">'.$prj_date.'</td>
                        '.$status.'
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';
        }

        return $data;
    }
    function DisplayPartStatus() {

        $data = '';

        $where = 'where is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("select id,part_status_name,description,status_color from tbl_part_status " . $where . " order by id desc");

        while ($row = mysqli_fetch_array($result)) {
          
           $data .='<tr>
                        <td style="color:'.$row['status_color'].'">'.$row['part_status_name'].'</td>
                        <td>'.$row['description'].'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }
    function DisplayPart() {

        $data = '';

        $where = 'where p.is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("select p.id,p.customer,p.project_no,p.date,p.part_no,p.raw_material_no,p.part_status,pro.id AS pro_id,pro.prj_no,c.id AS cust_id,c.ac_name,ps.id as status_id,ps.part_status_name,ps.status_color FROM tbl_part AS p LEFT JOIN tbl_account AS c ON p.customer=c.id LEFT JOIN tbl_project AS pro ON p.project_no=pro.id LEFT JOIN tbl_part_status AS ps ON p.part_status=ps.id ".$where." order by p.date desc ");

        while ($row = mysqli_fetch_array($result)) {
            if ($row['part_no'] == $row['raw_material_no']) {

                $raw_material_no = '';
            }
            else {

                $raw_material_no = $row['raw_material_no'];
            }
           
           $str = $row['date'];
           $part_date = date("d-m-Y", strtotime($str));
           $date1 = date("Y-m-d", strtotime($str));
            
           $data .='<tr>
                        <td class="hide"></td>
                        <td>'.$row['ac_name'].'</td>
                        <td class="text-center">'.$row['prj_no'].'</td>
                        <td class="text-center" data-order="'.$date1.'">'.$part_date.'</td>
                        <td class="text-center">'.$row['part_no'].'</td>
                        <td class="text-center">'.$raw_material_no.'</td>
                        <td class="text-center" style="color:'.$row['status_color'].'">'.$row['part_status_name'].'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }
    function DisplayContactData() {

        $data = '';

        $where = 'where is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("select id,contact_data_name,visible from tbl_contact_data " . $where . " order by id desc");

        while ($row = mysqli_fetch_array($result)) {
            if ($row['visible'] == 'y') {

                $visible = 'Yes';
            }
            else {

                $visible = 'No';
            }
          
           $data .='<tr>
                        <td>'.$row['contact_data_name'].'</td>
                        <td>'.$visible.'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }
    function DisplayCustomerPO() {

        $data = '';

        $where = 'where c.is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("select c.id,c.po_date,c.customer,c.project_no,c.part_no,c.po_no,c.quantity,c.dispatch_date,pro.id AS pro_id,pro.prj_no,ac.id AS cust_id,ac.ac_name,p.id as part_id,p.part_no FROM tbl_customer_po AS c LEFT JOIN tbl_account AS ac ON c.customer=ac.id LEFT JOIN tbl_project AS pro ON c.project_no=pro.id LEFT JOIN tbl_part AS p ON c.part_no=p.id " . $where . " order by c.po_date desc ");

        while ($row = mysqli_fetch_array($result)) {
          
            $str = $row['po_date'];
            $po_date = date("d-m-Y", strtotime($str));
            $date1 = date("Y-m-d", strtotime($str));
            
            $dis = $row['dispatch_date'];
            $dis_date = date("d-m-Y", strtotime($dis));
            $date2 = date("Y-m-d", strtotime($dis));
          
           $data .='<tr>
                        <td class="hide"></td>
                        <td class="text-left" data-order="'.$date1.'">'.$po_date.'</td>
                        <td class="text-left">'.$row['po_no'].'</td>
                        <td class="text-left">'.$row['ac_name'].'</td>
                        <td class="text-center">'.$row['prj_no'].'</td>
                        <td class="text-center">'.$row['part_no'].'</td>
                        <td class="text-center">'.$row['quantity'].'</td>
                        <td class="text-center" data-order="'.$date2.'">'.$dis_date.'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';
        }

        return $data;
    }
    
    function DisplayToolParameter() {

        $data = '';

        $where = 'where is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("select id,toolparameter,note from tbl_tool_parameter " . $where . " order by toolparameter asc");

        while ($row = mysqli_fetch_array($result)) {
          
           $data .='<tr>
                        <td>'.$row['toolparameter'].'</td>
                        <td>'.$row['note'].'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }
    
    function DisplayMasterProcess() {

        $data = '';

        $where = 'where is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("select id,process_name,description from tbl_master_process " . $where . " order by process_name asc");

        while ($row = mysqli_fetch_array($result)) {
          
           $data .='<tr>
                        <td>'.$row['process_name'].'</td>
                        <td>'.$row['description'].'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }
    
    function DisplayMaterial() {

        $data = '';

        $where = 'where m.is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("SELECT m.id,m.challan_no,m.challan_date,m.material_no,m.quantity,m.pending_quantity,m.customer,p.id as part_id,p.raw_material_no,ac.id as cust_id,ac.ac_name FROM tbl_material AS m LEFT JOIN tbl_part AS p ON p.id=m.material_no LEFT JOIN tbl_account AS ac ON m.customer=ac.id ".$where." ORDER BY m.challan_date DESC");

        while ($row = mysqli_fetch_array($result)) {
           
           $challan_dt = $row['challan_date'];
           $challan_date = date("d-m-Y", strtotime($challan_dt));
           $date1 = date("Y-m-d", strtotime($challan_dt));
            
           $data .='<tr>
                        <td class="hide"></td>
                        <td>'.$row['challan_no'].'</td>
                        <td class="text-center" data-order="'.$date1.'">'.$challan_date.'</td>
                        <td class="text-center">'.$row['raw_material_no'].'</td>
                        <td class="text-center">'.$row['quantity'].'</td>
                        <td class="text-center">'.$row['pending_quantity'].'</td>
                        <td class="text-center">'.$row['ac_name'].'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }
    
    function DisplayMaterialOutward() {

        $data = '';

        $where = 'where m.is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("SELECT m.id,m.challan_no,m.challan_date,m.part_no,m.fin_cr_mr_qty,p.id as part_id,p.part_no,ac.id as cust_id,ac.ac_name FROM tbl_material_outward AS m LEFT JOIN tbl_part AS p ON p.id=m.part_no LEFT JOIN tbl_account AS ac ON m.customer_name=ac.id ".$where." ORDER BY m.challan_date DESC");

        while ($row = mysqli_fetch_array($result)) {
           
           $challan_dt = $row['challan_date'];
           $challan_date = date("d-m-Y", strtotime($challan_dt));
           $date1 = date("Y-m-d", strtotime($challan_dt));
            
           $data .='<tr>
                        <td class="hide"></td>
                        <td>'.$row['challan_no'].'</td>
                        <td class="text-center" data-order="'.$date1.'">'.$challan_date.'</td>
                        <td class="text-center">'.$row['part_no'].'</td>
                        <td class="text-center">'.$row['ac_name'].'</td>
                        <td class="text-center">'.$row['fin_cr_mr_qty'].'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }
    
    function DisplayMachine() {

        $data = '';

        $where = 'where is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("select id,machine_no,description from tbl_machine " . $where . " order by machine_no asc");

        while ($row = mysqli_fetch_array($result)) {
          
           $data .='<tr>
                        <td>'.$row['machine_no'].'</td>
                        <td>'.$row['description'].'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }
    
    function DisplayWorkOrder() {

        $data = '';

        $where = 'where w.is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("SELECT w.id,w.date,w.work_order_no,w.part_no,w.quantity,w.pending_qty_po,w.customer,w.finish_date,p.id as part_id,p.part_no,ac.id as cust_id,ac.ac_name FROM tbl_work_order AS w LEFT JOIN tbl_part AS p ON w.part_no=p.id LEFT JOIN tbl_account AS ac ON w.customer=ac.id " . $where . " order by w.date desc");

        while ($row = mysqli_fetch_array($result)) {
          
           $str = $row['date'];
           $date = date("d-m-Y", strtotime($str));
           $date1 = date("Y-m-d", strtotime($str));
           
           $str2 = $row['finish_date'];
           $finish_date = date("d-m-Y", strtotime($str2));
           $date2 = date("Y-m-d", strtotime($str2));
          
           $data .='<tr>
                        <td class="hide"></td>
                        <td data-order="'.$date1.'">'.$date.'</td>
                        <td>'.$row['work_order_no'].'</td>
                        <td>'.$row['part_no'].'</td>
                        <td>'.$row['quantity'].'</td>
                        <td>'.$row['pending_qty_po'].'</td>
                        <td>'.$row['ac_name'].'</td>
                        <td data-order="'.$date2.'">'.$finish_date.'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';

        }

        return $data;
    }
    
    function DisplayInstrumentPending() {

        $data = '';
        $cr_date = date("Ym");
        $where = 'where i.is_delete="n" and i.status="a" and i.calibration="y" and EXTRACT(YEAR_MONTH from (i.`next_calibration_date`))="'.$cr_date.'"';

        $result = $GLOBALS['db']->ExeQuersys("select i.id,i.code,i.instrument,i.least_count,i.range_min,i.range_max,i.unit,i.status,ins.id as ins_id,ins.ins_name,u.id as u_id,u.unit FROM tbl_instrument as i LEFT JOIN tbl_ins as ins on i.instrument=ins.id LEFT JOIN tbl_unit as u on i.unit=u.id " . $where . " order by ins.ins_name asc");

        while ($row = mysqli_fetch_array($result)) {
          
           $data .='<tr>
                        <td class="text-left code-font">'.$row['code'].'</td>
                        <td class="text-left">'.$row['ins_name'].'</td>
                        <td class="text-center">'.$row['least_count'].'</td>
                        <td class="text-center">'.$row['range_min'].'</td>
                        <td class="text-center">'.$row['range_max'].'</td>
                        <td class="text-center">'.$row['unit'].'</td>
                        <td class="text-center">
                            <a onclick="checkId('.$row['id'].')" class="btn btn-sm btn-success btn-act"><i class="fa fa-plus"></i></a>
                        </td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';
        }

        return $data;
    }
    
    function DisplayInstrumentUpcoming() {

        $data = '';
        $cr_date = date('Ym', strtotime('+1 months'));
        $where = 'where i.is_delete="n" and i.status="a" and i.calibration="y" and EXTRACT(YEAR_MONTH from (i.`next_calibration_date`))="'.$cr_date.'"';

        $result = $GLOBALS['db']->ExeQuersys("select i.id,i.code,i.instrument,i.least_count,i.range_min,i.range_max,i.unit,i.status,ins.id as ins_id,ins.ins_name,u.id as u_id,u.unit FROM tbl_instrument as i LEFT JOIN tbl_ins as ins on i.instrument=ins.id LEFT JOIN tbl_unit as u on i.unit=u.id " . $where . " order by ins.ins_name asc");

        while ($row = mysqli_fetch_array($result)) {
          
           $data .='<tr>
                        <td class="text-left code-font">'.$row['code'].'</td>
                        <td class="text-left">'.$row['ins_name'].'</td>
                        <td class="text-center">'.$row['least_count'].'</td>
                        <td class="text-center">'.$row['range_min'].'</td>
                        <td class="text-center">'.$row['range_max'].'</td>
                        <td class="text-center">'.$row['unit'].'</td>
                    </tr>';
        }

        return $data;
    }
    
    function DisplayCalibration() {

        $data = '';

        $where = 'WHERE c.is_delete="n"';

        $result = $GLOBALS['db']->ExeQuersys("SELECT c.id,c.date,c.instrument_id,c.agency,ac.ac_name,i.instrument,i.code,ins.ins_name FROM tbl_calibration AS c LEFT JOIN tbl_account AS ac ON c.agency=ac.id LEFT JOIN tbl_instrument AS i ON c.instrument_id=i.id LEFT JOIN tbl_ins AS ins ON i.instrument=ins.id " . $where . " ORDER by date DESC LIMIT 50");

        while ($row = mysqli_fetch_array($result)) {
           $str = $row['date'];
           $date = date("d-m-Y", strtotime($str));
           $data .='<tr>
                        <td class="text-left code-font">'.$date.'</td>
                        <td class="text-left">'.$row['code'].'</td>
                        <td class="text-center">'.$row['ins_name'].'</td>
                        <td class="text-center">'.$row['ac_name'].'</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".firstModal" data-id="'.$row['id'].'" class="btn btn-sm btn-warning btn-act"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>';
        }

        return $data;
    }*/

}
?>