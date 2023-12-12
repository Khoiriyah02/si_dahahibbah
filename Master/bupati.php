<?php

namespace Master;

use Config\Query_builder;

class bupati
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $data = $this->db->table('bupati')->get()->resultArray();
        $res = ' <a href="?target=bupati&act=tambah_bupati" class="btn btn-info btn-sm">Tambah bupati</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>id</th>
                    <th>Password</th>
                    <th>username</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                    <td width="1000">' . $no . '</td>
                    <td width="100">' . $r['id'] . '</td>
                    <td width="100">' . $r['password'] . '</td>
                    <td width="100">' . $r['username'] . '</td>
                    <td width="150">
                        <a href="?target=bupati&act=edit_bupati&id=' . $r['id'] . '" class="btn btn-success btn-sm">
                            Edit
                        </a>
                        <a href="?target=bupati&act=delete_bupati&id=' . $r['id'] . '" class="btn btn-danger btn-sm">
                            Hapus
                        </a>
                    </td>
                </tr>';
            $no++;
        }
        $res .= '</tbody></table></div>';
        return $res;
    }

    public function tambah()
    {
        $res = '<a href="?target=bupati" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=bupati&act=simpan_bupati" method="post">
                 <div class="mb-3">
                     <label for="id" class="form-label">id</label>
                    <input type="text" class="form-control" id="id" name="id">
                </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="text" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">jenis kelamin</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';
        return $res;
    }

    public function simpan()
    {   
        $id = $_POST['id'];
        $password = $_POST['password'];
        $username = $_POST['username'];

        $data = array(
            'id' => $id,
            'password' => $password,
            'username' => $username,
        );
        return $this->db->table('bupati')->insert($data);
    }

    public function edit($id)
    {
        $r = $this->db->table('bupati')->where("id='$id'")->get()->rowArray();

        $res = '<a href="?target=bupati" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=bupati&act=update_bupati" method="post">
                <input type="hidden" class="form-control" id="param" name="param" value="' . $r['id'] . '">
                    <div class="mb-3">
                        <label for="id" class="form-label">id</label>
                        <input type="text" class="form-control" id="id" name="id" value="' . $r['id'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">jenis penggunaan</label>
                        <input type="text" class="form-control" id="password" name="password" value="' . $r['password'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">username</label>
                        <input type="text" class="form-control" id="username" name="username" value="' . $r['username'] . '">
                    </div>
                        
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>';
        return $res;
    }

    public function cekRadio($val1, $val2)
    {
        if ($val1 == $val2) {
            return "checked";
        }
        return "";
    }

    public function update()
    {
        $param = $_POST['param'];
        $id = $_POST['id'];
        $password = $_POST['password'];
        $username = $_POST['username'];
       
        $data = array(
            'id' => $id,
            'password' => $password,
            'username' => $username,
            
        );

        return $this->db->table('bupati')->where("nisn='$param'")->update($data);
    }

    public function delete($id)
    {

        return $this->db->table('bupati')->where("nisn='$id'")->delete();
    }
}
