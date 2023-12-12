<?php

namespace Master;

use Config\Query_builder;

class penerimahibah
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $data = $this->db->table('penerimahibah')->get()->resultArray();
        $res = ' <a href="?target=penerimahibah&act=tambah_penerimahibah" class="btn btn-info btn-sm">Tambah penerimahibah</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>id</th>
                    <th>disposisi</th>
                    <th>pakta_integritas</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                    <td width="10">' . $no . '</td>
                    <td width="100">' . $r['id'] . '</td>
                    <td width="100">' . $r['disposisi'] . '</td>
                    <td width="100">' . $r['pakta_integritas'] . '</td>
                    <td width="150">
                        <a href="?target=penerimahibah&act=edit_penerimahibah&id=' . $r['id'] . '" class="btn btn-success btn-sm">
                            Edit
                        </a>
                        <a href="?target=penerimahibah&act=delete_penerimahibah&id=' . $r['id'] . '" class="btn btn-danger btn-sm">
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
        $res = '<a href="?target=penerimahibah" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=penerimahibah&act=simpan_penerimahibah" method="post">
                 <div class="mb-3">
                     <label for="id" class="form-label">id</label>
                    <input type="text" class="form-control" id="id" name="id">
                </div>
                    <div class="mb-3">
                        <label for="disposisi" class="form-label">disposisi</label>
                        <input type="text" class="form-control" id="disposisi" name="disposisi">
                    </div>
                    <div class="mb-3">
                        <label for="pakta_integritas" class="form-label">pakta integritas</label>
                        <input type="text" class="form-control" id="pakta_integritas" name="pakta_integritas">
                    </div>    
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';
        return $res;
    }

    public function simpan()
    {   
        $id = $_POST['id'];
        $disposisi = $_POST['disposisi'];
        $pakta_integritas = $_POST['pakta_integritas'];
        

        $data = array(
            'id' => $id,
            'disposisi' => $disposisi,
            'pakta_integritas' => $pakta_integritas,
            
        );
        return $this->db->table('penerimahibah')->insert($data);
    }

    public function edit($id)
    {
        $r = $this->db->table('penerimahibah')->where("id='$id'")->get()->rowArray();

        $res = '<a href="?target=penerimahibah" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=penerimahibah&act=update_penerimahibah" method="post">
                <input type="hidden" class="form-control" id="param" name="param" value="' . $r['id'] . '">
                    <div class="mb-3">
                        <label for="id" class="form-label">jenis komponen</label>
                        <input type="text" class="form-control" id="id" name="id" value="' . $r['id'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="disposisi" class="form-label">jenis penggunaan</label>
                        <input type="text" class="form-control" id="disposisi" name="disposisi" value="' . $r['disposisi'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="pakta_integritas" class="form-label">barang jasa</label>
                        <input type="text" class="form-control" id="pakta_integritas" name="pakta_integritas" value="' . $r['pakta_integritas'] . '">
                    </div>
                    
                        
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
        $disposisi = $_POST['disposisi'];
        $pakta_integritas = $_POST['pakta_integritas'];
        

        $data = array(
            'id' => $id,
            'disposisi' => $disposisi,
            'pakta_integritas' => $pakta_integritas,
            
        );

        return $this->db->table('penerimahibah')->where("id='$param'")->update($data);
    }

    public function delete($id)
    {

        return $this->db->table('penerimahibah')->where("id='$id'")->delete();
    }
}
