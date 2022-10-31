<?php

namespace App\Controllers;

use App\Models\m_mahasiswa;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class c_mahasiswa extends BaseController
{
    protected $mahasiswaModel;

    public function __construct()
    {
        $this->mahasiswaModel = new m_mahasiswa();
    }

    public function display()
    {
        $data['nama'] = $this->request->getVar('nama');
        $data['mahasiswa'] = $this->mahasiswaModel->getMahasiswa($data);
        $data['jumlah_tinggi_badan'] = $this->mahasiswaModel->getJumlahTinggiBadan();
        $data['title'] = "Mahasiswa";
        $data['content_view'] = "v_mahasiswa";

        echo view('v_template', $data);
    }

    public function nilai()
    {
        $data['nama'] = $this->request->getVar('nama');
        $data['title'] = "Mahasiswa";
        $data['content_view'] = "v_nilai";
        if ($this->request->getFile('fileexcel') !== null) {
            $file_excel = $this->request->getFile('fileexcel');
            $ext = $file_excel->getClientExtension();
            if ($ext == 'xls') {
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
        } else {
            $path = FCPATH . "/assets/excel/nilaimhs.xlsx";
            $file_excel = new \CodeIgniter\Files\File($path);
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $data['excel_file'] = $this->request->getFile('fileexcel');
        // dd($data['excel_file']);

        $spreadsheet = $render->load($file_excel);

        $data['mahasiswa'] = $spreadsheet->getActiveSheet()->toArray();
        session()->set('arrayExcel', $data['mahasiswa']);
        // dd(session('arrayExcel'));

        echo view('v_template', $data);
    }

    public function grafik_tb()
    {
        $data['jumlah_tinggi_badan'] = $this->mahasiswaModel->getJumlahTinggiBadan();
        $data['title'] = "Grafik Tinggi badan Mahasiswa";
        $data['content_view'] = "v_grafik_tb";

        echo view('v_template', $data);
    }

    public function input()
    {
        $data['content_view'] = "v_mahasiswa_input";
        $data['title'] = "Input Mahasiswa";

        echo view('v_template', $data);
    }

    public function store()
    {
        $data = [
            'nim' => $this->request->getVar('nim'),
            'nama' => $this->request->getVar('nama'),
            'umur' => $this->request->getVar('umur'),
            'foto' => $this->request->getFile('foto'),
            'tinggi_badan' => $this->request->getVar('tinggi_badan'),
        ];

        $result = $this->mahasiswaModel->storeMahasiswa($data);

        if ($result) {
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->route('mahasiswa');
        }
    }

    function detail($id)
    {
        $data['mahasiswa'] = $this->mahasiswaModel->find($id);

        $data['content_view'] = "v_mahasiswa_detail";
        $data['title'] = "Detail Mahasiswa";

        echo view('v_template', $data);
    }

    function delete($id)
    {
        $mahasiswa = $this->mahasiswaModel->find($id);
        $this->mahasiswaModel->deleteMahasiswa($mahasiswa);
        return redirect()->to('/mahasiswa');
    }

    public function update($id)
    {
        $data = [
            'id' => $id,
            'nim'  => $this->request->getVar('nim'),
            'nama' => $this->request->getVar('nama'),
            'umur' => $this->request->getVar('umur'),
            'tinggi_badan' => $this->request->getVar('tinggi_badan'),
            'foto' => $this->request->getFile('foto'),
        ];

        $mahasiswa_lama = $this->mahasiswaModel->find($id);
        $data['foto_lama'] = $mahasiswa_lama['foto'];

        // dd($data);

        $result = $this->mahasiswaModel->updateMahasiswa($data);

        if ($result) {
            session()->setFlashdata('pesan', 'Data berhasil diupdate');
            return redirect()->route('mahasiswa');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswaModel->find($id);
        $data['content_view'] = "v_mahasiswa_edit";
        echo view('v_template', $data);
    }

    public function exportExcel()
    {

        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'NIM')
            ->setCellValue('B1', 'Nama')
            ->setCellValue('C1', 'UTS')
            ->setCellValue('D1', 'UAS');

        $column = 2;
        // tulis data mobil ke cell
        foreach (session('arrayExcel') as $x => $data) {
            if ($x == 0) {
                continue;
            }
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $data[0])
                ->setCellValue('B' . $column, $data[1])
                ->setCellValue('C' . $column, $data[2])
                ->setCellValue('D' . $column, $data[3]);
            $column++;
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Nilai Mahasiswa';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function storeNilaiExcel()
    {
        $path = "/assets/excel/nilaimhs.xlsx";
        $file = new \CodeIgniter\Files\File($path);
        $file_excel = $this->request->getFile('fileexcel');
        $ext = $file_excel->getClientExtension();
        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $render->load($file_excel);

        $data = $spreadsheet->getActiveSheet()->toArray();
        foreach ($data as $x => $row) {
            if ($x == 0) {
                continue;
            }

            $nim = $row[0];
            $nama = $row[1];
            $uts = $row[2];
            $uas = $row[3];

            $db = \Config\Database::connect();

            $cekNis = $db->table('nilai_mahasiswa')->getWhere(['nim' => $nim])->getResult();

            if (count($cekNis) > 0) {
                session()->setFlashdata('message', '<b style="color:red">Data Gagal di Import NIM ada yang sama</b>');
            } else {

                $simpandata = [
                    'nim' => $nim, 'nama' => $nama, 'uts' => $uts, 'uas' => $uas
                ];

                $result = $db->table('nilai_mahasiswa')->insert($simpandata);
                session()->setFlashdata('message', 'Berhasil import excel');
            }
        }

        return redirect()->to('/mahasiswa/nilai');
    }
}
