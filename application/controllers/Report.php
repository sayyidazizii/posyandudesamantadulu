<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != true) {
            redirect('Login');
        }
        $this->load->model('M_penimbangan');
        $this->load->model('M_balita');
        $this->load->model('M_kematian');
    }

    public function balita()
    {
        $data['page'] = 'Laporan Balita';
        $data['balita'] = $this->M_balita->get_data();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Laporan/Balita/index', $data);
        // $this->load->view('layout/footer');
    }

    public function kematian()
    {
        $data['page'] = 'Laporan Kematian';
        $data['balita'] = $this->M_balita->get_data();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Laporan/Kematian/index', $data);
        // $this->load->view('layout/footer');
    }

    //get balita
    public function fetch_data()
    {
        $id_balita = $this->input->post('id_balita');

        $dataBalita = $this->M_balita->getbyid($id_balita);

        echo json_encode($dataBalita); // Kirim sebagai respons
    }


    //**Balita */

    public function viewBalita()
    {
        $id_balita = $this->input->get('id_balita');
        // echo json_encode($id_balita);
        //     exit;
        $data['page'] = 'Laporan Balita';
        if ($id_balita > 0) {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['balita'] = $this->M_balita->print($id_balita);

            $this->load->view('layout/header');
            $this->load->view('layout/sidebar');
            $this->load->view('layout/navbar');
            $this->load->view('content/Laporan/Balita/view', $data);
            $this->load->view('layout/footer');
        } else {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['balita'] = $this->M_balita->get_data();

            $this->load->view('layout/header');
            $this->load->view('layout/sidebar');
            $this->load->view('layout/navbar');
            $this->load->view('content/Laporan/Balita/view', $data);
            $this->load->view('layout/footer');
        }
    }

    public function cetakBalita()
    {
        $id_balita = $this->input->get('id_balita');
        $data['page'] = 'Laporan Balita';

        if ($id_balita > 0) {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['balita'] = $this->M_balita->print($id_balita);
        } else {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['balita'] = $this->M_balita->get_data();
        }

        // Load library DOMPDF
        $this->load->library('pdf');

        // Set paper size and orientation
        $this->pdf->setPaper('A4', 'landscape');

        // Set filename
        $this->pdf->filename = "Laporan Balita.pdf";

        // Load the view and create PDF
        $this->pdf->load_view('content/Laporan/Balita/pdf_view', $data);
    }

    //export excel balita
    public function exportBalita()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];
        $sheet->setCellValue('A1', "LAPORAN DATA BALITA"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('A1:I1'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $sheet->setCellValue('B3', "NIB"); // Set kolom B3 dengan tulisan "NIS"
        $sheet->setCellValue('C3', "NAMA LENGKAP"); // Set kolom C3 dengan tulisan "NAMA"
        $sheet->setCellValue('D3', "TEMPAT, TANGGAL LAHIR"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $sheet->setCellValue('E3', "JENIS KELAMIN");
        $sheet->setCellValue('F3', "USIA");
        $sheet->setCellValue('G3', "NAMA AYAH");
        $sheet->setCellValue('H3', "NAMA IBU");

        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        $sheet->getStyle('E3')->applyFromArray($style_col);
        $sheet->getStyle('F3')->applyFromArray($style_col);
        $sheet->getStyle('G3')->applyFromArray($style_col);
        $sheet->getStyle('H3')->applyFromArray($style_col);
        // $sheet->getStyle('I3')->applyFromArray($style_col);
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya

        $id_balita = $this->input->get('id_balita');

        if ($id_balita > 0) {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['balita'] = $this->M_balita->print($id_balita);
        } else {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['balita'] = $this->M_balita->get_data();
        }
        // var_dump($data['data_rekam_medis']);
        // exit;

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($data['balita'] as $data) { // Lakukan looping pada variabel siswa
            $sheet->setCellValue('A' . $numrow, $no);
            $sheet->setCellValue('B' . $numrow, $data->nib);
            $sheet->setCellValue('C' . $numrow, $data->nama_lengkap);
            $sheet->setCellValue('D' . $numrow, $data->tempat_lahir . ", " . $data->tempat_lahir);
            $sheet->setCellValue('E' . $numrow, $data->jenis_kelamin);
            $sheet->setCellValue('F' . $numrow, $data->usia);
            $sheet->setCellValue('G' . $numrow, $data->nama_ayah);
            $sheet->setCellValue('H' . $numrow, $data->nama_ibu);
            // if ($data->status_bayar == 1) {
            // 	$sheet->setCellValue('I' . $numrow, 'dibayar');
            // } else {
            // 	$sheet->setCellValue('I' . $numrow, 'dibayar');
            // }
            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('F' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('G' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('H' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('I' . $numrow)->applyFromArray($style_row);


            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(15);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(30);
        $sheet->getColumnDimension('F')->setWidth(30);
        $sheet->getColumnDimension('G')->setWidth(30);
        $sheet->getColumnDimension('H')->setWidth(30);
        // $sheet->getColumnDimension('I')->setWidth(30);


        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle("Laporan Balita");
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="lAPORAN DATA BALITA.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function printBalita()
    {
        $id_balita = $this->input->get('id_balita');
        $data['page'] = 'Laporan Balita';

        if ($id_balita > 0) {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['balita'] = $this->M_balita->print($id_balita);
        } else {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['balita'] = $this->M_balita->get_data();
        }
        // Load the view 
        $this->load->view('content/Laporan/Balita/print', $data);
    }


    //**Kematian */
    public function viewKematian()
    {
        $id_balita = $this->input->get('id_balita');
        // echo json_encode($id_balita);
        //     exit;
        $data['page'] = 'Laporan Kematian';
        if ($id_balita > 0) {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['kematian'] = $this->M_kematian->print($id_balita);

            $this->load->view('layout/header');
            $this->load->view('layout/sidebar');
            $this->load->view('layout/navbar');
            $this->load->view('content/Laporan/Kematian/view', $data);
            $this->load->view('layout/footer');
        } else {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['kematian'] = $this->M_keamtian->get_data();

            $this->load->view('layout/header');
            $this->load->view('layout/sidebar');
            $this->load->view('layout/navbar');
            $this->load->view('content/Laporan/Balita/view', $data);
            $this->load->view('layout/footer');
        }
    }

    public function cetakKematian()
    {
        $id_balita = $this->input->get('$id_balita');
        $data['page'] = 'Laporan Balita';

        if ($id_balita > 0) {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['kematian'] = $this->M_kematian->print($id_balita);
        } else {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['kematian'] = $this->M_kematian->get_data();
        }

        // Load library DOMPDF
        $this->load->library('pdf');

        // Set paper size and orientation
        $this->pdf->setPaper('A4', 'landscape');

        // Set filename
        $this->pdf->filename = "Laporan Kematian.pdf";

        // Load the view and create PDF
        $this->pdf->load_view('content/Laporan/Kematian/pdf_view', $data);
    }

    //export excel kematian
    public function exportKematian()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];
        $sheet->setCellValue('A1', "LAPORAN DATA KEMATIAN"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('A1:I1'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $sheet->setCellValue('B3', "NIB"); // Set kolom B3 dengan tulisan "NIS"
        $sheet->setCellValue('C3', "NAMA LENGKAP"); // Set kolom C3 dengan tulisan "NAMA"
        $sheet->setCellValue('D3', "TEMPAT, TANGGAL LAHIR"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $sheet->setCellValue('E3', "ALAMAT");
        $sheet->setCellValue('F3', "KETERANGAN");
        // $sheet->setCellValue('G3', "NAMA AYAH");
        // $sheet->setCellValue('H3', "NAMA IBU");

        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        $sheet->getStyle('E3')->applyFromArray($style_col);
        $sheet->getStyle('F3')->applyFromArray($style_col);
        // $sheet->getStyle('G3')->applyFromArray($style_col);
        // $sheet->getStyle('H3')->applyFromArray($style_col);
        // $sheet->getStyle('I3')->applyFromArray($style_col);
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya

        $id_balita = $this->input->get('id_balita');

        if ($id_balita > 0) {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['kematian'] = $this->M_kematian->print($id_balita);
        } else {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['kematian'] = $this->M_kematian->get_data();
        }
        // var_dump($data['data_rekam_medis']);
        // exit;

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($data['kematian'] as $data) { // Lakukan looping pada variabel siswa
            $sheet->setCellValue('A' . $numrow, $no);
            $sheet->setCellValue('B' . $numrow, $data->nib);
            $sheet->setCellValue('C' . $numrow, $data->nama_lengkap);
            $sheet->setCellValue('D' . $numrow, $data->tempat_lahir . ", " . $data->tempat_lahir);
            $sheet->setCellValue('E' . $numrow, $data->alamat);
            $sheet->setCellValue('F' . $numrow, $data->keterangan);
            // $sheet->setCellValue('G' . $numrow, $data->nama_ayah);
            // $sheet->setCellValue('H' . $numrow, $data->nama_ibu);
            // if ($data->status_bayar == 1) {
            // 	$sheet->setCellValue('I' . $numrow, 'dibayar');
            // } else {
            // 	$sheet->setCellValue('I' . $numrow, 'dibayar');
            // }
            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('F' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('G' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('H' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('I' . $numrow)->applyFromArray($style_row);


            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(15);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(30);
        $sheet->getColumnDimension('F')->setWidth(30);
        // $sheet->getColumnDimension('G')->setWidth(30);
        // $sheet->getColumnDimension('H')->setWidth(30);
        // $sheet->getColumnDimension('I')->setWidth(30);


        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle("Laporan Kematian");
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="lAPORAN DATA KEMATIAN.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function printKematian()
    {
        $id_balita = $this->input->get('id_balita');
        $data['page'] = 'Laporan Balita';

        if ($id_balita > 0) {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['balita'] = $this->M_balita->print($id_balita);
        } else {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['balita'] = $this->M_balita->get_data();
        }
        // Load the view 
        $this->load->view('content/Laporan/Balita/print', $data);
    }
}
