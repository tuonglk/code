<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo 'This is page title'; ?></title>
        <!-- Bootstrap CSS -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    </head>
   <body class="container">
        <h1 class="text-center">Hello World</h1>

        <?php
        include 'bt1_function.php';
        if(isset($_POST['giaovien']))
        {
            $db = new Database();
            $arrData = array(
                'id'=>'',
                'ten'=> $_POST['ten'],
                'tuoi'=> $_POST['tuoi']
                );
            $db->insert("giao_vien", $arrData);
        }

        ?>
        <div class="row">
            <div class="col-md-4">
                <form action="" method="POST" >
                    <legend>Thêm giáo viên</legend>
                
                    <div class="form-group">
                        <label for="">Tên</label>
                        <input type="text" name="ten" class="form-control" id="" placeholder="Input field">
                    </div>

                    <div class="form-group">
                        <label for="">Tuổi</label>
                        <input type="text" name="tuoi" class="form-control" id="" placeholder="Input field">
                    </div>
                
                    <button type="submit" name="giaovien" class="btn btn-primary">Thêm giáo viên</button>
                </form>
            </div>


            <?php 
                if(isset($_POST['lop']))
                {
                    $db = new Database();
                    $arrData = array(
                        'id'=>'',
                        'ten_lop'=>$_POST['ten_lop'],
                        'id_giao_vien'=>$_POST['id_giao_vien']
                    );
                    $db->insert('lop',$arrData);
                }


            ?>
            
            <div class="col-md-4">
                <form action="" method="POST" role="form">
                    <legend>Thêm lớp</legend>
                
                    <div class="form-group">
                        <label for="">Tên</label>
                        <input type="text" name="ten_lop" class="form-control" id="" placeholder="Input field">
                    </div>

                    <div class="form-group">
                        <label for="">Giáo Viên</label>
                        <select name="id_giao_vien" class="form-control">
                            <?php
                                $db = new Database();
                                $arrSelect = $db->getAlldata('giao_vien');
                                foreach ($arrSelect as $key => $value) 
                                {
                                    echo '<option value="'.$value['id'].'">'.$value['ten'].'</option>';
                                }
                            ?>
                        </select>

                    </div>
                
                    <button type="submit" name="lop" class="btn btn-primary">Thêm lớp</button>
                </form>
            </div>




            <?php 
                if(isset($_POST['hocsinh']))
                {
                    $db = new Database();
                    $arrData = array(
                        'id'=>'',
                        'ten_hs'=>$_POST['ten_hs'],
                        'id_lop'=>$_POST['id_lop']
            
                    );
                    $db->insert('hoc_sinh',$arrData);
                }


            ?>
    
            <div class="col-md-4">
                <form action="" method="POST" role="form">
                    <legend>Thêm học sinh</legend>
                
                    <div class="form-group">
                        <label for="">Tên</label>
                        <input type="text" name="ten_hs" class="form-control" id="" placeholder="Input field">
                    </div>

                    <div class="form-group">
                        <label for="">Lớp</label>
                        <select name="id_lop" class="form-control">
                            <?php 
                                $db = new Database();
                                $arrSelect = $db->getAlldata('lop');
                                foreach ($arrSelect as $key => $value) {
                                    echo '<option value="'.$value['id'].'">'.$value['ten_lop'].'</option>';
                                }

                            ?>
                        </select>
                    </div>
                
                    <button type="submit" name="hocsinh" class="btn btn-primary">Thêm HS</button>
                </form>
            </div>
        </div>



        <br><br><br>

        <div class="row">
            <div class="col-sm-4">
                <select onchange="ajaxGetLop(this.value);" class="form-control">
                            <option>-----------</option>
                            <?php 
                                $db = new Database();
                                $arrData = $db->getAlldata('giao_vien');
                                foreach ($arrData as $key => $value) 
                                {
                                    echo '<option value="'.$value['id'].'">'.$value['ten'].'</option>';
                                }

                            ?>
                        </select>
            </div>
            <div class="col-sm-4">
                <select id='ajaxLop' onchange="ajaxGetHocSinh(this.value);" class="form-control">
                        <option>-----------</option> 

                </select>
            </div>
            <div class="col-sm-4">
                <select id='ajaxHocSinh' class="form-control">
                        <option>-----------</option>    
                </select>
            </div>


        </div>

        <!-- jQuery -->
        <script src="http://code.jquery.com/jquery.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </body>
</html