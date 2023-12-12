<?php

namespace Master;

use Config\Query_builder;

class staffkesra
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $data = $this->db->table('staffkesra')->get()->resultArray();
        $res = ' <a href="?target=staffkesra&act=tambah_staffkesra" class="btn btn-info btn-sm">Tambah staffkesra</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>id</th>
                    <th>nama_lembaga</th>
                    <th>kepala_lembaga</th>
                    <th>alamat</th>
                    <th>jumlah_bantuan</th>
                    <th>nik</th>
                    <th>nohp</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                    <td width="10">' . $no . '</td>
                    <td width="100">' . $r['id'] . '</td>
                    <td width="100">' . $r['nama_lembaga'] . '</td>
                    <td width="100">' . $r['kepala_lembaga'] . '</td>
                    <td width="10">' . $r['alamat'] . '</td>
                    <td width="10">' . $r['jumlah_bantuan'] . '</td>
                    <td width="10">' . $r['nik'] . '</td>
                    <td width="10">' . $r['nohp'] . '</td>
                    <td width="150">
                        <a href="?target=staffkesra&act=edit_staffkesra&id=' . $r['id'] . '" class="btn btn-success btn-sm">
                            Edit
                        </a>
                        <a href="?target=staffkesra&act=delete_staffkesra&id=' . $r['id'] . '" class="btn btn-danger btn-sm">
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
        $res = '<a href="?target=staffkesra" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=staffkesra&act=simpan_staffkesra" method="post">
                 <div class="mb-3">
                     <label for="id" class="form-label">id</label>
                    <input type="text" class="form-control" id="id" name="id">
                </div>
                    <div class="mb-3">
                        <label for="nama_lembaga" class="form-label">nama lembaga</label>
                        <input type="text" class="form-control" id="nama_lembaga" name="nama_lembaga">
                    </div>
                    <div class="mb-3">
                        <label for="kepala_lembaga" class="form-label">kepala lembaga</label>
                        <input type="text" class="form-control" id="kepala_lembaga" name="kepala_lembaga">
                    </div>
                    <div class="mb-3">
                            <label for="alamat" class="form-label">alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="mb-3">
                            <label for="jumlah_bantuan" class="form-label">jumlah_bantuan</label>
                            <input type="text" class="form-control" id="jumlah_bantuan" name="jumlah_bantuan">
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label">nik</label>
                        <input type="text" class="form-control" id="nik" name="nik">
                    </div>
                    <div class="mb-3">
                        <label for="nohp" class="form-label">nohp</label>
                        <input type="text" class="form-control" id="nohp" name="nohp">
                    </div>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';
        return $res;
    }

    public function simpan()
    {   
        $id = $_POST['id'];
        $nama_lembaga = $_POST['nama_lembaga'];
        $kepala_lembaga = $_POST['kepala_lembaga'];
        $alamat = $_POST['alamat'];
        $jumlah_bantuan = $_POST['jumlah_bantuan'];
        $nik = $_POST['nik'];
        $nohp = $_POST['nohp'];

        $data = array(
            'id' => $id,
            'nama_lembaga' => $nama_lembaga,
            'kepala_lembaga' => $kepala_lembaga,
            'alamat' => $alamat,
            'jumlah_bantuan' => $jumlah_bantuan,
            'nik' => $nik,
            'nohp' => $nohp
        );
        return $this->db->table('staffkesra')->insert($data);
    }

    public function edit($id)
    {
        $r = $this->db->table('staffkesra')->where("id='$id'")->get()->rowArray();

        $res = '<a href="?target=staffkesra" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=staffkesra&act=update_staffkesra" method="post">
                <input type="hidden" class="form-control" id="param" name="param" value="' . $r['id'] . '">
                    <div class="mb-3">
                        <label for="id" class="form-label">jenis komponen</label>
                        <input type="text" class="form-control" id="id" name="id" value="' . $r['id'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="nama_lembaga" class="form-label">jenis penggunaan</label>
                        <input type="text" class="form-control" id="nama_lembaga" name="nama_lembaga" value="' . $r['nama_lembaga'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="kepala_lembaga" class="form-label">barang jasa</label>
                        <input type="text" class="form-control" id="kepala_lembaga" name="kepala_lembaga" value="' . $r['kepala_lembaga'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="' . $r['alamat'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_bantuan" class="form-label">jumlah_bantuan</label>
                        <input type="text" class="form-control" id="jumlah_bantuan" name="jumlah_bantuan" value="' . $r['jumlah_bantuan'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label">nik</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="' . $r['nik'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label">nik</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="' . $r['nik'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="nohp" class="form-label">nohp</label>
                        <input type="text" class="form-control" id="nohp" name="nohp" value="' . $r['nohp'] . '">
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
        $nama_lembaga = $_POST['nama_lembaga'];
        $kepala_lembaga = $_POST['kepala_lembaga'];
        $alamat = $_POST['alamat'];
        $jumlah_bantuan = $_POST['jumlah_bantuan'];
        $nik = $_POST['nik'];
        $nohp = $_POST['nohp'];

        $data = array(
            'id' => $id,
            'nama_lembaga' => $nama_lembaga,
            'kepala_lembaga' => $kepala_lembaga,
            'alamat' => $alamat,
            'jumlah_bantuan' => $jumlah_bantuan,
            'nik' => $nik,
            'nohp' => $nohp
        );

        return $this->db->table('staffkesra')->where("id='$param'")->update($data);
    }

    public function delete($id)
    {

        return $this->db->table('staffkesra')->where("id='$id'")->delete();
    }
}
