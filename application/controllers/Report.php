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
        $this->load->model('M_imunisasi');
    }

    public function balita()
    {
        $data['page'] = 'Laporan Balita';
        $data['balita'] = $this->M_balita->get_data();
        $data['id_balita'] = $this->input->get('id_balita');
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Laporan/Balita/index', $data);
        // $this->load->view('layout/footer');
    }

    public function Kematian()
    {
        $data['page'] = 'Laporan Kematian';
        $data['balita'] = $this->M_balita->get_data();
        $data['id_balita'] = $this->input->get('id_balita');
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

    //get balita
    public function fetch_data_kematian()
    {
        $id_balita = $this->input->post('id_balita');

        $dataBalita = $this->M_kematian->getdatabyid($id_balita);

        echo json_encode($dataBalita); // Kirim sebagai respons
    }

    //imunisasi
    public function viewRekapImunisasi()
    {
        $id_balita = $this->input->get('id_balita');
        $data['page'] = 'Laporan Imunisasi Balita';

        if ($id_balita > 0) {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['imunisasi'] = $this->M_imunisasi->getbyBalita($id_balita);
        } else {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['imunisasi'] = $this->M_imunisasi->get_data();
        }
        //logo 1
        $imgpath1 = base_url('assets/img/luwu.png');
        $ext1 = pathinfo($imgpath1, PATHINFO_EXTENSION);
        $img1 = file_get_contents($imgpath1);
        $data['logo1'] = 'data:image/' . $ext1 . ';base64,' . base64_encode($img1);

        //logo2
        $imgpath2 = base_url('assets/img/login-img.png');
        $ext2 = pathinfo($imgpath2, PATHINFO_EXTENSION);
        $img2 = file_get_contents($imgpath2);
        $data['logo2'] = 'data:image/' . $ext2 . ';base64,' . base64_encode($img2);

        // Load library DOMPDF
        $this->load->library('pdf');

        // Set paper size and orientation
        $this->pdf->setPaper('A4', 'landscape');

        // Set filename
        $this->pdf->filename = "Laporan Rekap Imunisasi.pdf";

        // Load the view and create PDF
        $this->pdf->load_view('content/Laporan/Balita/rekap_imunisasi_v', $data);
    }


    //**Balita */

    public function viewRekap()
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

        //logo 1
        $imgpath1 = base_url('assets/img/luwu.png');
        $ext1 = pathinfo($imgpath1, PATHINFO_EXTENSION);
        $img1 = file_get_contents($imgpath1);
        $data['logo1'] = 'data:image/' . $ext1 . ';base64,' . base64_encode($img1);

        //logo2
        $imgpath2 = base_url('assets/img/login-img.png');
        $ext2 = pathinfo($imgpath2, PATHINFO_EXTENSION);
        $img2 = file_get_contents($imgpath2);
        $data['logo2'] = 'data:image/' . $ext2 . ';base64,' . base64_encode($img2);
        // echo json_encode($data);
        // exit;


        // Load library DOMPDF
        $this->load->library('pdf');

        // Set paper size and orientation
        $this->pdf->setPaper('A4', 'landscape');

        // Set filename
        $this->pdf->filename = "Laporan Balita.pdf";

        // Load the view and create PDF
        $this->pdf->load_view('content/Laporan/Balita/rekap_v', $data);
    }


    public function viewAnalys()
    {
        $id_balita = $this->input->get('id_balita');
        $data['page'] = 'Laporan Analisis Stunting';

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
        // $this->pdf->load_view('content/Laporan/Balita/analisis_v.php', $data);
        $this->load->view('content/Laporan/Balita/analisis_v.php', $data);
    }

    public function viewBalita()
    {
        $id_balita = $this->input->get('id_balita');
        // echo json_encode($id_balita);
        //     exit;
        $data['page'] = 'Laporan Balita';
        if ($id_balita > 0) {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['balita'] = $this->M_balita->view($id_balita);

            $this->load->view('layout/header');
            $this->load->view('layout/sidebar');
            $this->load->view('layout/navbar');
            $this->load->view('content/Laporan/Balita/view', $data);
            $this->load->view('layout/footer');
        } else {
            // $id_balita = $this->input->get('id_balita');
            // $data['id_balita'] = 0;
            // $data['balita'] = $this->M_balita->get_data();

            // $this->load->view('layout/header');
            // $this->load->view('layout/sidebar');
            // $this->load->view('layout/navbar');
            // $this->load->view('content/Laporan/Balita/view', $data);
            // $this->load->view('layout/footer');
            redirect('Report/balita');
        }
    }

    public function cetakBalita()
    {
        $id_balita = $this->input->get('id_balita');
        $data['page'] = 'Laporan Balita';

        if ($id_balita > 0) {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['balita'] = $this->M_balita->view($id_balita);
        } else {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['balita'] = $this->M_balita->get_data();
        }
        //logo 1
        $imgpath1 = base_url('assets/img/luwu.png');
        $ext1 = pathinfo($imgpath1, PATHINFO_EXTENSION);
        $img1 = file_get_contents($imgpath1);
        $data['logo1'] = 'data:image/' . $ext1 . ';base64,' . base64_encode($img1);

        //logo2
        $imgpath2 = base_url('assets/img/login-img.png');
        $ext2 = pathinfo($imgpath2, PATHINFO_EXTENSION);
        $img2 = file_get_contents($imgpath2);
        $data['logo2'] = 'data:image/' . $ext2 . ';base64,' . base64_encode($img2);

        // Load library DOMPDF
        $this->load->library('pdf');

        // Set paper size and orientation
        $this->pdf->setPaper('A4', 'potrait');

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

        // // Mendapatkan logo dari file
        $logo = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();

        $logoPath = 'assets/img/luwu.png'; // Ganti dengan path menuju logo Anda
        $logo->setPath($logoPath);
        $logo->setHeight(50); // Atur tinggi logo
        $logo->setCoordinates('A2'); // Tentukan koordinat (kolom dan baris) di mana logo akan ditempatkan
        $logo->setWorksheet($spreadsheet->getActiveSheet());

        $logo2 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();

        $logoPath2 = 'assets/img/login-img.png'; // Ganti dengan path menuju logo Anda
        $logo2->setPath($logoPath2);
        $logo2->setHeight(50); // Atur tinggi logo
        $logo2->setCoordinates('H2'); // Tentukan koordinat (kolom dan baris) di mana logo akan ditempatkan
        $logo2->setWorksheet($spreadsheet->getActiveSheet());

        // Geser header ke bawah satu baris
        $sheet->insertNewRowBefore(1, 1);


        $sheet->setCellValue('A5', "LAPORAN DATA BALITA"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->setCellValue('A6', "POSYANDU DESA MANTADULU"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('A5:H5'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A5')->getFont()->setBold(true); // Set bold kolom A1
        // Mengatur teks menjadi berada di tengah secara horizontal dan vertikal pada sel A5
        $sheet->getStyle('A5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A5')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);


        $sheet->mergeCells('A6:H6'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A6')->getFont()->setBold(true); // Set bold kolom A1
        // Mengatur teks menjadi berada di tengah secara horizontal dan vertikal pada sel A6
        $sheet->getStyle('A6')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A6')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A7', "NO"); // Set kolom A7 dengan tulisan "NO"
        $sheet->setCellValue('B7', "NIB"); // Set kolom B7 dengan tulisan "NIS"
        $sheet->setCellValue('C7', "NAMA LENGKAP"); // Set kolom C7 dengan tulisan "NAMA"
        $sheet->setCellValue('D7', "TEMPAT, TANGGAL LAHIR"); // Set kolom D7 dengan tulisan "JENIS KELAMIN"
        $sheet->setCellValue('E7', "JENIS KELAMIN");
        $sheet->setCellValue('F7', "USIA");
        $sheet->setCellValue('G7', "NAMA AYAH");
        $sheet->setCellValue('H7', "NAMA IBU");
        // $sheet->setCellValue('I7', "BERAT BADAN");
        // $sheet->setCellValue('J7', "TINGGI BADAN");
        // $sheet->setCellValue('K7', "LINGKAR KEPALA");
        // $sheet->setCellValue('L7', "LINGKAR PERUT");
        // $sheet->setCellValue('M7', "KETERANGAN");



        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $sheet->getStyle('A7')->applyFromArray($style_col);
        $sheet->getStyle('B7')->applyFromArray($style_col);
        $sheet->getStyle('C7')->applyFromArray($style_col);
        $sheet->getStyle('D7')->applyFromArray($style_col);
        $sheet->getStyle('E7')->applyFromArray($style_col);
        $sheet->getStyle('F7')->applyFromArray($style_col);
        $sheet->getStyle('G7')->applyFromArray($style_col);
        $sheet->getStyle('H7')->applyFromArray($style_col);
        // $sheet->getStyle('I7')->applyFromArray($style_col);
        // $sheet->getStyle('J7')->applyFromArray($style_col);
        // $sheet->getStyle('K7')->applyFromArray($style_col);
        // $sheet->getStyle('L7')->applyFromArray($style_col);
        // $sheet->getStyle('M7')->applyFromArray($style_col);

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya

        $id_balita = $this->input->get('id_balita');

        // if ($id_balita > 0) {
        $id_balita = $this->input->get('id_balita');
        $data['id_balita'] = $this->input->get('id_balita');
        $data['balita'] = $this->M_balita->view($id_balita);
        // } else {
        //     $id_balita = $this->input->get('id_balita');
        //     $data['id_balita'] = $this->input->get('id_balita');
        //     $data['balita'] = $this->M_balita->get_data();
        // }

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 8; // Set baris pertama untuk isi tabel adalah baris ke 5
        foreach ($data['balita'] as $data) { // Lakukan looping pada variabel siswa
            $sheet->setCellValue('A' . $numrow, $no);
            $sheet->setCellValue('B' . $numrow, $data->nib);
            $sheet->setCellValue('C' . $numrow, $data->nama_lengkap);
            $sheet->setCellValue('D' . $numrow, $data->tempat_lahir . ", " . $data->tanggal_lahir);
            $sheet->setCellValue('E' . $numrow, $data->jenis_kelamin);
            $sheet->setCellValue('F' . $numrow, $data->usia . 'Bulan');
            $sheet->setCellValue('G' . $numrow, $data->nama_ayah);
            $sheet->setCellValue('H' . $numrow, $data->nama_ibu);
            // $sheet->setCellValue('I' . $numrow, $data->berat_badan . 'Kg');
            // $sheet->setCellValue('J' . $numrow, $data->tinggi_badan . 'cm');
            // $sheet->setCellValue('K' . $numrow, $data->lingkar_kepala . 'cm');
            // $sheet->setCellValue('L' . $numrow, $data->lingkar_perut . 'cm');
            // $sheet->setCellValue('M' . $numrow, $data->keterangan);

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
            // $sheet->getStyle('J' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('K' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('L' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('M' . $numrow)->applyFromArray($style_row);

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
        // $sheet->getColumnDimension('J')->setWidth(30);
        // $sheet->getColumnDimension('K')->setWidth(30);
        // $sheet->getColumnDimension('L')->setWidth(30);
        // $sheet->getColumnDimension('M')->setWidth(50);

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
        //logo 1
        $imgpath1 = base_url('assets/img/luwu.png');
        $ext1 = pathinfo($imgpath1, PATHINFO_EXTENSION);
        $img1 = file_get_contents($imgpath1);
        $data['logo1'] = 'data:image/' . $ext1 . ';base64,' . base64_encode($img1);

        //logo2
        $imgpath2 = base_url('assets/img/login-img.png');
        $ext2 = pathinfo($imgpath2, PATHINFO_EXTENSION);
        $img2 = file_get_contents($imgpath2);
        $data['logo2'] = 'data:image/' . $ext2 . ';base64,' . base64_encode($img2);

        if ($id_balita > 0) {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['balita'] = $this->M_balita->view($id_balita);
        } else {
            // $id_balita = $this->input->get('id_balita');
            // $data['id_balita'] = $this->input->get('id_balita');
            // $data['balita'] = $this->M_balita->get_data();
            redirect('Report/balita');
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
            // $id_balita = $this->input->get('id_balita');
            // $data['id_balita'] = 0;
            // $data['kematian'] = $this->M_kematian->get_data();

            // $this->load->view('layout/header');
            // $this->load->view('layout/sidebar');
            // $this->load->view('layout/navbar');
            // $this->load->view('content/Laporan/Kematian/view', $data);
            // $this->load->view('layout/footer');
            redirect('Report/Kematian');
        }
    }

    public function cetakKematian()
    {
        $id_balita = $this->input->get('id_balita');
        $data['page'] = 'Laporan Balita';

        if (!empty($id_balita)) {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['kematian'] = $this->M_kematian->print($id_balita);
        } else {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['kematian'] = $this->M_kematian->get_data();
        }
        //logo 1
        $imgpath1 = base_url('assets/img/luwu.png');
        $ext1 = pathinfo($imgpath1, PATHINFO_EXTENSION);
        $img1 = file_get_contents($imgpath1);
        $data['logo1'] = 'data:image/' . $ext1 . ';base64,' . base64_encode($img1);

        //logo2
        $imgpath2 = base_url('assets/img/login-img.png');
        $ext2 = pathinfo($imgpath2, PATHINFO_EXTENSION);
        $img2 = file_get_contents($imgpath2);
        $data['logo2'] = 'data:image/' . $ext2 . ';base64,' . base64_encode($img2);

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


        // // Mendapatkan logo dari file
        $logo = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();

        $logoPath = 'assets/img/luwu.png'; // Ganti dengan path menuju logo Anda
        $logo->setPath($logoPath);
        $logo->setHeight(50); // Atur tinggi logo
        $logo->setCoordinates('A2'); // Tentukan koordinat (kolom dan baris) di mana logo akan ditempatkan
        $logo->setWorksheet($spreadsheet->getActiveSheet());

        $logo2 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();

        $logoPath2 = 'assets/img/login-img.png'; // Ganti dengan path menuju logo Anda
        $logo2->setPath($logoPath2);
        $logo2->setHeight(50); // Atur tinggi logo
        $logo2->setCoordinates('H2'); // Tentukan koordinat (kolom dan baris) di mana logo akan ditempatkan
        $logo2->setWorksheet($spreadsheet->getActiveSheet());

        // Geser header ke bawah satu baris
        $sheet->insertNewRowBefore(1, 1);


        $sheet->setCellValue('A5', "LAPORAN DATA KEMATIAN"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->setCellValue('A6', "POSYANDU DESA MANTADULU"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('A5:H5'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A5')->getFont()->setBold(true); // Set bold kolom A1
        // Mengatur teks menjadi berada di tengah secara horizontal dan vertikal pada sel A5
        $sheet->getStyle('A5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A5')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);


        $sheet->mergeCells('A6:H6'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A6')->getFont()->setBold(true); // Set bold kolom A1
        // Mengatur teks menjadi berada di tengah secara horizontal dan vertikal pada sel A6
        $sheet->getStyle('A6')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A6')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A7', "NO"); // Set kolom A7 dengan tulisan "NO"
        $sheet->setCellValue('B7', "TGL KEMATIAN"); // Set kolom B7 dengan tulisan "NIS"
        $sheet->setCellValue('C7', "NIB"); // Set kolom B7 dengan tulisan "NIS"
        $sheet->setCellValue('D7', "NAMA LENGKAP"); // Set kolom C7 dengan tulisan "NAMA"
        $sheet->setCellValue('E7', "TEMPAT, TANGGAL LAHIR"); // Set kolom D7 dengan tulisan "JENIS KELAMIN"
        $sheet->setCellValue('F7', "ALAMAT");
        $sheet->setCellValue('G7', "KETERANGAN");
        // $sheet->setCellValue('H7', "NAMA AYAH");

        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $sheet->getStyle('A7')->applyFromArray($style_col);
        $sheet->getStyle('B7')->applyFromArray($style_col);
        $sheet->getStyle('C7')->applyFromArray($style_col);
        $sheet->getStyle('D7')->applyFromArray($style_col);
        $sheet->getStyle('E7')->applyFromArray($style_col);
        $sheet->getStyle('F7')->applyFromArray($style_col);
        $sheet->getStyle('G7')->applyFromArray($style_col);

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


        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 8; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($data['kematian'] as $data) { // Lakukan looping pada variabel siswa
            $sheet->setCellValue('A' . $numrow, $no);
            $sheet->setCellValue('B' . $numrow, $data->tgl_kematian);
            $sheet->setCellValue('C' . $numrow, $data->nib);
            $sheet->setCellValue('D' . $numrow, $data->nama_lengkap);
            $sheet->setCellValue('E' . $numrow, $data->tempat_lahir . ", " . $data->tanggal_lahir);
            $sheet->setCellValue('F' . $numrow, $data->alamat);
            $sheet->setCellValue('G' . $numrow, $data->keterangan);
            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('F' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('G' . $numrow)->applyFromArray($style_row);



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
        $data['page'] = 'Laporan Kematian';
        //logo 1
        $imgpath1 = base_url('assets/img/luwu.png');
        $ext1 = pathinfo($imgpath1, PATHINFO_EXTENSION);
        $img1 = file_get_contents($imgpath1);
        $data['logo1'] = 'data:image/' . $ext1 . ';base64,' . base64_encode($img1);

        //logo2
        $imgpath2 = base_url('assets/img/login-img.png');
        $ext2 = pathinfo($imgpath2, PATHINFO_EXTENSION);
        $img2 = file_get_contents($imgpath2);
        $data['logo2'] = 'data:image/' . $ext2 . ';base64,' . base64_encode($img2);
        if ($id_balita > 0) {
            $id_balita = $this->input->get('id_balita');
            $data['id_balita'] = $this->input->get('id_balita');
            $data['kematian'] = $this->M_kematian->print($id_balita);
        } else {
            // $id_balita = $this->input->get('id_balita');
            // $data['id_balita'] = $this->input->get('id_balita');
            // $data['kematian'] = $this->M_kematian->get_data();
            redirect('Report/kematian');
        }
        // Load the view 
        $this->load->view('content/Laporan/Kematian/print', $data);
    }

    public function rekap_all_balita()
    {
        $data['page'] = 'Laporan Rekap Data Balita';
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Laporan/Balita/Rekap/index', $data);
    }

    /**Rekap Penimbangan */
    public function rekap_all_penimbangan()
    {
        $start_date = $this->input->get('start_date');
        $end_date     = $this->input->get('end_date');
        $data['page'] = 'Laporan Rekap Data Penimbangan Balita';

        if ($start_date != null and $end_date != null) {
            $data['penimbangan'] = $this->M_balita->all_rekap_penimbangan($start_date, $end_date);
            $data['start_date'] = $this->input->get('start_date');
            $data['end_date'] = $this->input->get('end_date');
        } else {
            $data['penimbangan'] = array(); // or $data['penimbangan'] = [];
            $data['start_date'] = null;
            $data['end_date'] = null;
        }
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Laporan/Balita/Rekap/rekap_penimbangan', $data);
    }

    public function cetakRekapPenimbangan()
    {
        $start_date = $this->input->get('start_date');
        $end_date     = $this->input->get('end_date');
        $data['page'] = 'Laporan Rekap Data Penimbangan Balita';

        if ($start_date != null and $end_date != null) {
            $data['penimbangan'] = $this->M_balita->all_rekap_penimbangan($start_date, $end_date);
            $data['start_date'] = $this->input->get('start_date');
            $data['end_date'] = $this->input->get('end_date');
        } else {
            $data['penimbangan'] = array(); // or $data['penimbangan'] = [];
            $data['start_date'] = null;
            $data['end_date'] = null;
        }
        //logo 1
        $imgpath1 = base_url('assets/img/luwu.png');
        $ext1 = pathinfo($imgpath1, PATHINFO_EXTENSION);
        $img1 = file_get_contents($imgpath1);
        $data['logo1'] = 'data:image/' . $ext1 . ';base64,' . base64_encode($img1);

        //logo2
        $imgpath2 = base_url('assets/img/login-img.png');
        $ext2 = pathinfo($imgpath2, PATHINFO_EXTENSION);
        $img2 = file_get_contents($imgpath2);
        $data['logo2'] = 'data:image/' . $ext2 . ';base64,' . base64_encode($img2);

        // Load library DOMPDF
        $this->load->library('pdf');

        // Set paper size and orientation
        $this->pdf->setPaper('A4', 'landscape');

        // Set filename
        $this->pdf->filename = "Laporan Rekap Penimbangan.pdf";

        // Load the view and create PDF
        $this->pdf->load_view('content/Laporan/Balita/Rekap/pdf/rekap_penimbangan_v.php', $data);
    }

    public function exportRekapPenimbangan()
    {


        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya

        $start_date = $this->input->get('start_date');
        $end_date     = $this->input->get('end_date');

        if ($start_date != null and $end_date != null) {
            $data['penimbangan'] = $this->M_balita->all_rekap_penimbangan($start_date, $end_date);
            $data['start_date'] = $this->input->get('start_date');
            $data['end_date'] = $this->input->get('end_date');
        } else {
            $data['penimbangan'] = array(); // or $data['penimbangan'] = [];
            $data['start_date'] = null;
            $data['end_date'] = null;
        }
        // var_dump($data['data_rekam_medis']);
        // exit;
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

        // // Mendapatkan logo dari file
        $logo = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();

        $logoPath = 'assets/img/luwu.png'; // Ganti dengan path menuju logo Anda
        $logo->setPath($logoPath);
        $logo->setHeight(50); // Atur tinggi logo
        $logo->setCoordinates('A2'); // Tentukan koordinat (kolom dan baris) di mana logo akan ditempatkan
        $logo->setWorksheet($spreadsheet->getActiveSheet());

        $logo2 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();

        $logoPath2 = 'assets/img/login-img.png'; // Ganti dengan path menuju logo Anda
        $logo2->setPath($logoPath2);
        $logo2->setHeight(50); // Atur tinggi logo
        $logo2->setCoordinates('N2'); // Tentukan koordinat (kolom dan baris) di mana logo akan ditempatkan
        $logo2->setWorksheet($spreadsheet->getActiveSheet());

        // Geser header ke bawah satu baris
        $sheet->insertNewRowBefore(1, 1);


        $sheet->setCellValue('A5', "LAPORAN REKAP DATA PENIMBANGAN BALITA"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->setCellValue('A6', "POSYANDU DESA MANTADULU"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('A5:N5'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A5')->getFont()->setBold(true); // Set bold kolom A1
        // Mengatur teks menjadi berada di tengah secara horizontal dan vertikal pada sel A5
        $sheet->getStyle('A5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A5')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);


        $sheet->mergeCells('A6:N6'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A6')->getFont()->setBold(true); // Set bold kolom A1
        // Mengatur teks menjadi berada di tengah secara horizontal dan vertikal pada sel A6
        $sheet->getStyle('A6')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A6')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A7', "NO"); // Set kolom A7 dengan tulisan "NO"
        $sheet->setCellValue('B7', "NIB"); // Set kolom B7 dengan tulisan "NIS"
        $sheet->setCellValue('c7', "TGL PENIMBANGAN"); // Set kolom B7 dengan tulisan "NIS"
        $sheet->setCellValue('D7', "NAMA LENGKAP"); // Set kolom C7 dengan tulisan "NAMA"
        $sheet->setCellValue('E7', "TEMPAT, TANGGAL LAHIR"); // Set kolom D7 dengan tulisan "JENIS KELAMIN"
        $sheet->setCellValue('F7', "JENIS KELAMIN");
        $sheet->setCellValue('G7', "USIA");
        $sheet->setCellValue('H7', "NAMA AYAH");
        $sheet->setCellValue('I7', "NAMA IBU");
        $sheet->setCellValue('J7', "BERAT BADAN");
        $sheet->setCellValue('K7', "TINGGI BADAN");
        $sheet->setCellValue('L7', "LINGKAR KEPALA");
        $sheet->setCellValue('M7', "LINGKAR PERUT");
        $sheet->setCellValue('N7', "KETERANGAN");



        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $sheet->getStyle('A7')->applyFromArray($style_col);
        $sheet->getStyle('B7')->applyFromArray($style_col);
        $sheet->getStyle('C7')->applyFromArray($style_col);
        $sheet->getStyle('D7')->applyFromArray($style_col);
        $sheet->getStyle('E7')->applyFromArray($style_col);
        $sheet->getStyle('F7')->applyFromArray($style_col);
        $sheet->getStyle('G7')->applyFromArray($style_col);
        $sheet->getStyle('H7')->applyFromArray($style_col);
        $sheet->getStyle('I7')->applyFromArray($style_col);
        $sheet->getStyle('J7')->applyFromArray($style_col);
        $sheet->getStyle('K7')->applyFromArray($style_col);
        $sheet->getStyle('L7')->applyFromArray($style_col);
        $sheet->getStyle('M7')->applyFromArray($style_col);
        $sheet->getStyle('N7')->applyFromArray($style_col);


        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 8; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($data['penimbangan'] as $data) { // Lakukan looping pada variabel siswa
            $sheet->setCellValue('A' . $numrow, $no);
            $sheet->setCellValue('B' . $numrow, $data->nib);
            $sheet->setCellValue('C' . $numrow, $data->tgl_penimbangan);
            $sheet->setCellValue('D' . $numrow, $data->nama_lengkap);
            $sheet->setCellValue('E' . $numrow, $data->tempat_lahir . ", " . $data->tanggal_lahir);
            $sheet->setCellValue('F' . $numrow, $data->jenis_kelamin);
            $sheet->setCellValue('G' . $numrow, $data->usia . 'Bulan');
            $sheet->setCellValue('H' . $numrow, $data->nama_ayah);
            $sheet->setCellValue('I' . $numrow, $data->nama_ibu);
            $sheet->setCellValue('J' . $numrow, $data->berat_badan . 'Kg');
            $sheet->setCellValue('K' . $numrow, $data->tinggi_badan . 'cm');
            $sheet->setCellValue('L' . $numrow, $data->lingkar_kepala . 'cm');
            $sheet->setCellValue('M' . $numrow, $data->lingkar_perut . 'cm');
            $sheet->setCellValue('N' . $numrow, $data->keterangan);

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
            $sheet->getStyle('I' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('J' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('K' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('L' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('M' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('N' . $numrow)->applyFromArray($style_row);

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
        $sheet->getColumnDimension('I')->setWidth(30);
        $sheet->getColumnDimension('J')->setWidth(30);
        $sheet->getColumnDimension('K')->setWidth(30);
        $sheet->getColumnDimension('L')->setWidth(30);
        $sheet->getColumnDimension('M')->setWidth(30);
        $sheet->getColumnDimension('N')->setWidth(30);

        // $sheet->getColumnDimension('I')->setWidth(30);


        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle("Laporan Balita");
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="lAPORAN REKAP DATA PENIMBANGAN BALITA.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function printRekapPenimbangan()
    {
        $id_balita = $this->input->get('id_balita');
        $data['page'] = 'Laporan Balita';
        //logo 1
        $imgpath1 = base_url('assets/img/luwu.png');
        $ext1 = pathinfo($imgpath1, PATHINFO_EXTENSION);
        $img1 = file_get_contents($imgpath1);
        $data['logo1'] = 'data:image/' . $ext1 . ';base64,' . base64_encode($img1);

        //logo2
        $imgpath2 = base_url('assets/img/login-img.png');
        $ext2 = pathinfo($imgpath2, PATHINFO_EXTENSION);
        $img2 = file_get_contents($imgpath2);
        $data['logo2'] = 'data:image/' . $ext2 . ';base64,' . base64_encode($img2);

        $start_date = $this->input->get('start_date');
        $end_date     = $this->input->get('end_date');
        $data['page'] = 'Laporan Rekap Data Penimbangan Balita';

        if ($start_date != null and $end_date != null) {
            $data['penimbangan'] = $this->M_balita->all_rekap_penimbangan($start_date, $end_date);
            $data['start_date'] = $this->input->get('start_date');
            $data['end_date'] = $this->input->get('end_date');
        } else {
            $data['penimbangan'] = array(); // or $data['penimbangan'] = [];
            $data['start_date'] = null;
            $data['end_date'] = null;
        }
        // Load the view 
        $this->load->view('content/Laporan/Balita/Rekap/print/rekappenimbangan', $data);
    }



    /**Rekap Imunisasi */
    public function rekap_all_imunisasi()
    {
        $start_date = $this->input->get('start_date');
        $end_date     = $this->input->get('end_date');
        $data['page'] = 'Laporan Rekap Data Imunisasi Balita';

        if ($start_date != null and $end_date != null) {
            $data['imunisasi'] = $this->M_balita->all_rekap_imunisasi($start_date, $end_date);
            $data['start_date'] = $this->input->get('start_date');
            $data['end_date'] = $this->input->get('end_date');
        } else {
            $data['imunisasi'] = array();
            $data['start_date'] = null;
            $data['end_date'] = null;
        }
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Laporan/Balita/Rekap/rekap_imunisasi', $data);
    }

    public function cetakRekapImunisasi()
    {
        $start_date = $this->input->get('start_date');
        $end_date     = $this->input->get('end_date');
        $data['page'] = 'Laporan Rekap Data Imunisasi Balita';

        if ($start_date != null and $end_date != null) {
            $data['imunisasi'] = $this->M_balita->all_rekap_imunisasi($start_date, $end_date);
            $data['start_date'] = $this->input->get('start_date');
            $data['end_date'] = $this->input->get('end_date');
        } else {
            $data['imunisasi'] = array();
            $data['start_date'] = null;
            $data['end_date'] = null;
        }
        //logo 1
        $imgpath1 = base_url('assets/img/luwu.png');
        $ext1 = pathinfo($imgpath1, PATHINFO_EXTENSION);
        $img1 = file_get_contents($imgpath1);
        $data['logo1'] = 'data:image/' . $ext1 . ';base64,' . base64_encode($img1);

        //logo2
        $imgpath2 = base_url('assets/img/login-img.png');
        $ext2 = pathinfo($imgpath2, PATHINFO_EXTENSION);
        $img2 = file_get_contents($imgpath2);
        $data['logo2'] = 'data:image/' . $ext2 . ';base64,' . base64_encode($img2);

        // Load library DOMPDF
        $this->load->library('pdf');

        // Set paper size and orientation
        $this->pdf->setPaper('A4', 'landscape');

        // Set filename
        $this->pdf->filename = "Laporan Rekap Imunisasi.pdf";

        // Load the view and create PDF
        $this->pdf->load_view('content/Laporan/Balita/Rekap/pdf/rekap_imunisasi_v', $data);
    }

    public function exportRekapImunisasi()
    {

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya

        $start_date = $this->input->get('start_date');
        $end_date     = $this->input->get('end_date');

        if ($start_date != null and $end_date != null) {
            $data['imunisasi'] = $this->M_balita->all_rekap_imunisasi($start_date, $end_date);
            $data['start_date'] = $this->input->get('start_date');
            $data['end_date'] = $this->input->get('end_date');
        } else {
            $data['imunisasi'] = array();
            $data['start_date'] = null;
            $data['end_date'] = null;
        }
        // echo json_encode($data['imunisasi']);
        // exit;

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

        // // Mendapatkan logo dari file
        $logo = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();

        $logoPath = 'assets/img/luwu.png'; // Ganti dengan path menuju logo Anda
        $logo->setPath($logoPath);
        $logo->setHeight(50); // Atur tinggi logo
        $logo->setCoordinates('A2'); // Tentukan koordinat (kolom dan baris) di mana logo akan ditempatkan
        $logo->setWorksheet($spreadsheet->getActiveSheet());

        $logo2 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();

        $logoPath2 = 'assets/img/login-img.png'; // Ganti dengan path menuju logo Anda
        $logo2->setPath($logoPath2);
        $logo2->setHeight(50); // Atur tinggi logo
        $logo2->setCoordinates('I2'); // Tentukan koordinat (kolom dan baris) di mana logo akan ditempatkan
        $logo2->setWorksheet($spreadsheet->getActiveSheet());

        // Geser header ke bawah satu baris
        $sheet->insertNewRowBefore(1, 1);


        $sheet->setCellValue('A5', "LAPORAN REKAP DATA IMUNISASI BALITA"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->setCellValue('A6', "POSYANDU DESA MANTADULU"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('A5:I5'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A5')->getFont()->setBold(true); // Set bold kolom A1
        // Mengatur teks menjadi berada di tengah secara horizontal dan vertikal pada sel A5
        $sheet->getStyle('A5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A5')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);


        $sheet->mergeCells('A6:I6'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A6')->getFont()->setBold(true); // Set bold kolom A1
        // Mengatur teks menjadi berada di tengah secara horizontal dan vertikal pada sel A6
        $sheet->getStyle('A6')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A6')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A7', "NO"); // Set kolom A7 dengan tulisan "NO"
        $sheet->setCellValue('B7', "NIB"); // Set kolom B7 dengan tulisan "NIS"
        $sheet->setCellValue('C7', "NAMA LENGKAP"); // Set kolom C7 dengan tulisan "NAMA"
        $sheet->setCellValue('D7', "TGL IMUNISASI"); // Set kolom C7 dengan tulisan "NAMA"
        $sheet->setCellValue('E7', "TEMPAT, TANGGAL LAHIR"); // Set kolom D7 dengan tulisan "JENIS KELAMIN"
        $sheet->setCellValue('F7', "USIA");
        $sheet->setCellValue('G7', "IMUNISASI");
        $sheet->setCellValue('H7', "VITAMIN A");
        $sheet->setCellValue('I7', "KETERANGAN");



        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $sheet->getStyle('A7')->applyFromArray($style_col);
        $sheet->getStyle('B7')->applyFromArray($style_col);
        $sheet->getStyle('C7')->applyFromArray($style_col);
        $sheet->getStyle('D7')->applyFromArray($style_col);
        $sheet->getStyle('E7')->applyFromArray($style_col);
        $sheet->getStyle('F7')->applyFromArray($style_col);
        $sheet->getStyle('G7')->applyFromArray($style_col);
        $sheet->getStyle('H7')->applyFromArray($style_col);
        $sheet->getStyle('I7')->applyFromArray($style_col);
        // $sheet->getStyle('J7')->applyFromArray($style_col);
        // $sheet->getStyle('K7')->applyFromArray($style_col);
        // $sheet->getStyle('L7')->applyFromArray($style_col);
        // $sheet->getStyle('M7')->applyFromArray($style_col);
        // $sheet->getStyle('N7')->applyFromArray($style_col);



        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 8; // Set baris pertama untuk isi tabel adalah baris ke 8
        foreach ($data['imunisasi'] as $data) { // Lakukan looping pada variabel siswa
            $sheet->setCellValue('A' . $numrow, $no);
            $sheet->setCellValue('B' . $numrow, $data->nib);
            $sheet->setCellValue('C' . $numrow, $data->nama_lengkap);
            $sheet->setCellValue('D' . $numrow, $data->tgl_imunisasi);
            $sheet->setCellValue('E' . $numrow, $data->tempat_lahir . ", " . $data->tanggal_lahir);
            $sheet->setCellValue('F' . $numrow, $data->usia . 'Bulan');
            $sheet->setCellValue('G' . $numrow, $data->imunisasi);
            $sheet->setCellValue('H' . $numrow, $data->vitamin);
            $sheet->setCellValue('I' . $numrow, $data->keterangan);

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
            $sheet->getStyle('I' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('J' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('K' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('L' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('M' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('N' . $numrow)->applyFromArray($style_row);

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
        $sheet->getColumnDimension('I')->setWidth(30);
        // $sheet->getColumnDimension('J')->setWidth(30);
        // $sheet->getColumnDimension('K')->setWidth(30);
        // $sheet->getColumnDimension('L')->setWidth(30);
        // $sheet->getColumnDimension('M')->setWidth(30);
        // $sheet->getColumnDimension('N')->setWidth(30);

        // $sheet->getColumnDimension('I')->setWidth(30);


        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle("Laporan Balita");
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="lAPORAN REKAP DATA IMUNISASI BALITA.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function printRekapImunisasi()
    {
        //logo 1
        $imgpath1 = base_url('assets/img/luwu.png');
        $ext1 = pathinfo($imgpath1, PATHINFO_EXTENSION);
        $img1 = file_get_contents($imgpath1);
        $data['logo1'] = 'data:image/' . $ext1 . ';base64,' . base64_encode($img1);

        //logo2
        $imgpath2 = base_url('assets/img/login-img.png');
        $ext2 = pathinfo($imgpath2, PATHINFO_EXTENSION);
        $img2 = file_get_contents($imgpath2);
        $data['logo2'] = 'data:image/' . $ext2 . ';base64,' . base64_encode($img2);

        $start_date = $this->input->get('start_date');
        $end_date     = $this->input->get('end_date');
        $data['page'] = 'Laporan Rekap Data Imunisasi Balita';

        if ($start_date != null and $end_date != null) {
            $data['imunisasi'] = $this->M_balita->all_rekap_imunisasi($start_date, $end_date);
            $data['start_date'] = $this->input->get('start_date');
            $data['end_date'] = $this->input->get('end_date');
        } else {
            $data['imunisasi'] = array();
            $data['start_date'] = null;
            $data['end_date'] = null;
        }
        // Load the view 
        $this->load->view('content/Laporan/Balita/Rekap/print/rekapimunisasi', $data);
    }


    //**Rekap Kematian */
    public function rekap_all_kematian()
    {
        $start_date = $this->input->get('start_date');
        $end_date     = $this->input->get('end_date');
        $data['page'] = 'Laporan Rekap Data Kematian Balita';

        if ($start_date != null and $end_date != null) {
            $data['kematian'] = $this->M_kematian->all_rekap_kematian($start_date, $end_date);
            $data['start_date'] = $this->input->get('start_date');
            $data['end_date'] = $this->input->get('end_date');
        } else {
            $data['kematian'] = array();
            $data['start_date'] = null;
            $data['end_date'] = null;
        }
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Laporan/Balita/Rekap/kematian', $data);
    }

    public function cetakRekapKematian()
    {
        $start_date = $this->input->get('start_date');
        $end_date     = $this->input->get('end_date');
        $data['page'] = 'Laporan Rekap Data Kematian Balita';

        if ($start_date != null and $end_date != null) {
            $data['kematian'] = $this->M_kematian->all_rekap_kematian($start_date, $end_date);
            $data['start_date'] = $this->input->get('start_date');
            $data['end_date'] = $this->input->get('end_date');
        } else {
            $data['kematian'] = array();
            $data['start_date'] = null;
            $data['end_date'] = null;
        }
        //logo 1
        $imgpath1 = base_url('assets/img/luwu.png');
        $ext1 = pathinfo($imgpath1, PATHINFO_EXTENSION);
        $img1 = file_get_contents($imgpath1);
        $data['logo1'] = 'data:image/' . $ext1 . ';base64,' . base64_encode($img1);

        //logo2
        $imgpath2 = base_url('assets/img/login-img.png');
        $ext2 = pathinfo($imgpath2, PATHINFO_EXTENSION);
        $img2 = file_get_contents($imgpath2);
        $data['logo2'] = 'data:image/' . $ext2 . ';base64,' . base64_encode($img2);

        // Load library DOMPDF
        $this->load->library('pdf');

        // Set paper size and orientation
        $this->pdf->setPaper('A4', 'landscape');

        // Set filename
        $this->pdf->filename = "Laporan Rekap Kematian Balita.pdf";

        // Load the view and create PDF
        $this->pdf->load_view('content/Laporan/Balita/Rekap/pdf/rekap_kematian_v', $data);
    }

    public function exportRekapKematian()
    {


        $start_date = $this->input->get('start_date');
        $end_date     = $this->input->get('end_date');
        $data['page'] = 'Laporan Rekap Data Kematian Balita';

        if ($start_date != null and $end_date != null) {
            $data['kematian'] = $this->M_kematian->all_rekap_kematian($start_date, $end_date);
            $data['start_date'] = $this->input->get('start_date');
            $data['end_date'] = $this->input->get('end_date');
        } else {
            $data['kematian'] = array();
            $data['start_date'] = null;
            $data['end_date'] = null;
        }


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


        // // Mendapatkan logo dari file
        $logo = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();

        $logoPath = 'assets/img/luwu.png'; // Ganti dengan path menuju logo Anda
        $logo->setPath($logoPath);
        $logo->setHeight(50); // Atur tinggi logo
        $logo->setCoordinates('A2'); // Tentukan koordinat (kolom dan baris) di mana logo akan ditempatkan
        $logo->setWorksheet($spreadsheet->getActiveSheet());

        $logo2 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();

        $logoPath2 = 'assets/img/login-img.png'; // Ganti dengan path menuju logo Anda
        $logo2->setPath($logoPath2);
        $logo2->setHeight(50); // Atur tinggi logo
        $logo2->setCoordinates('G2'); // Tentukan koordinat (kolom dan baris) di mana logo akan ditempatkan
        $logo2->setWorksheet($spreadsheet->getActiveSheet());

        // Geser header ke bawah satu baris
        $sheet->insertNewRowBefore(1, 1);


        $sheet->setCellValue('A5', "LAPORAN REKAP DATA KEMATIAN BALITA"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->setCellValue('A6', "POSYANDU DESA MANTADULU"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('A5:G5'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A5')->getFont()->setBold(true); // Set bold kolom A1
        // Mengatur teks menjadi berada di tengah secara horizontal dan vertikal pada sel A5
        $sheet->getStyle('A5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A5')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);


        $sheet->mergeCells('A6:G6'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A6')->getFont()->setBold(true); // Set bold kolom A1
        // Mengatur teks menjadi berada di tengah secara horizontal dan vertikal pada sel A6
        $sheet->getStyle('A6')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A6')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A7', "NO"); // Set kolom A7 dengan tulisan "NO"
        $sheet->setCellValue('B7', "TGL KEMATIAN"); // Set kolom B7 dengan tulisan "NIS"
        $sheet->setCellValue('C7', "NIB"); // Set kolom B7 dengan tulisan "NIS"
        $sheet->setCellValue('D7', "NAMA LENGKAP"); // Set kolom C7 dengan tulisan "NAMA"
        $sheet->setCellValue('E7', "TEMPAT, TANGGAL LAHIR"); // Set kolom D7 dengan tulisan "JENIS KELAMIN"
        $sheet->setCellValue('F7', "ALAMAT");
        $sheet->setCellValue('G7', "KETERANGAN");



        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $sheet->getStyle('A7')->applyFromArray($style_col);
        $sheet->getStyle('B7')->applyFromArray($style_col);
        $sheet->getStyle('C7')->applyFromArray($style_col);
        $sheet->getStyle('D7')->applyFromArray($style_col);
        $sheet->getStyle('E7')->applyFromArray($style_col);
        $sheet->getStyle('F7')->applyFromArray($style_col);
        $sheet->getStyle('G7')->applyFromArray($style_col);



        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 8; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($data['kematian'] as $data) { // Lakukan looping pada variabel siswa
            $sheet->setCellValue('A' . $numrow, $no);
            $sheet->setCellValue('B' . $numrow, $data->tgl_kematian);
            $sheet->setCellValue('C' . $numrow, $data->nib);
            $sheet->setCellValue('D' . $numrow, $data->nama_lengkap);
            $sheet->setCellValue('E' . $numrow, $data->tempat_lahir . ", " . $data->tanggal_lahir);
            $sheet->setCellValue('F' . $numrow, $data->alamat);
            $sheet->setCellValue('G' . $numrow, $data->keterangan);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('F' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('G' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('H' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('I' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('J' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('K' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('L' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('M' . $numrow)->applyFromArray($style_row);

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
        // $sheet->getColumnDimension('H')->setWidth(30);
        // $sheet->getColumnDimension('I')->setWidth(30);
        // $sheet->getColumnDimension('J')->setWidth(30);
        // $sheet->getColumnDimension('K')->setWidth(30);
        // $sheet->getColumnDimension('L')->setWidth(30);
        // $sheet->getColumnDimension('M')->setWidth(30);

        // $sheet->getColumnDimension('I')->setWidth(30);


        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle("Laporan Balita");
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="lAPORAN REKAPP DATA KEMATIAN BALITA.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function printRekapKematian()
    {
        //logo 1
        $imgpath1 = base_url('assets/img/luwu.png');
        $ext1 = pathinfo($imgpath1, PATHINFO_EXTENSION);
        $img1 = file_get_contents($imgpath1);
        $data['logo1'] = 'data:image/' . $ext1 . ';base64,' . base64_encode($img1);

        //logo2
        $imgpath2 = base_url('assets/img/login-img.png');
        $ext2 = pathinfo($imgpath2, PATHINFO_EXTENSION);
        $img2 = file_get_contents($imgpath2);
        $data['logo2'] = 'data:image/' . $ext2 . ';base64,' . base64_encode($img2);

        $start_date = $this->input->get('start_date');
        $end_date     = $this->input->get('end_date');
        $data['page'] = 'Laporan Rekap Data Kematian Balita';

        if ($start_date != null and $end_date != null) {
            $data['kematian'] = $this->M_kematian->all_rekap_kematian($start_date, $end_date);
            $data['start_date'] = $this->input->get('start_date');
            $data['end_date'] = $this->input->get('end_date');
        } else {
            $data['kematian'] = array();
            $data['start_date'] = null;
            $data['end_date'] = null;
        }
        // Load the view 
        $this->load->view('content/Laporan/Balita/Rekap/print/rekapkematian', $data);
    }


    /**Rekap all Balita */
    public function rekap_all_data_balita()
    {
        $start_date = $this->input->get('start_date');
        $end_date     = $this->input->get('end_date');
        $data['page'] = 'Laporan Rekap Data Balita';

        if ($start_date != null and $end_date != null) {
            $data['balita'] = $this->M_balita->all_rekap_balita($start_date, $end_date);
            $data['start_date'] = $this->input->get('start_date');
            $data['end_date'] = $this->input->get('end_date');
        } else {
            $data['balita'] = array();
            $data['start_date'] = null;
            $data['end_date'] = null;
        }
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Laporan/Balita/Rekap/rekap_balita', $data);
    }

    public function cetakRekapDataBalita()
    {

        $data['page'] = 'Laporan Rekap Data Balita';

        // $data['balita'] = $this->M_balita->all_rekap_balita();
        $start_date = $this->input->get('start_date');
        $end_date     = $this->input->get('end_date');
        $data['page'] = 'Laporan Rekap Data Balita';

        if ($start_date != null and $end_date != null) {
            $data['balita'] = $this->M_balita->all_rekap_balita($start_date, $end_date);
            $data['start_date'] = $this->input->get('start_date');
            $data['end_date'] = $this->input->get('end_date');
        } else {
            $data['balita'] = array();
            $data['start_date'] = null;
            $data['end_date'] = null;
        }

        //logo 1
        $imgpath1 = base_url('assets/img/luwu.png');
        $ext1 = pathinfo($imgpath1, PATHINFO_EXTENSION);
        $img1 = file_get_contents($imgpath1);
        $data['logo1'] = 'data:image/' . $ext1 . ';base64,' . base64_encode($img1);

        //logo2
        $imgpath2 = base_url('assets/img/login-img.png');
        $ext2 = pathinfo($imgpath2, PATHINFO_EXTENSION);
        $img2 = file_get_contents($imgpath2);
        $data['logo2'] = 'data:image/' . $ext2 . ';base64,' . base64_encode($img2);

        // Load library DOMPDF
        $this->load->library('pdf');

        // Set paper size and orientation
        $this->pdf->setPaper('A4', 'landscape');

        // Set filename
        $this->pdf->filename = "Laporan Rekap Data Balita.pdf";

        // Load the view and create PDF
        $this->pdf->load_view('content/Laporan/Balita/Rekap/pdf/rekap_balita_v', $data);
    }

    public function exportRekapDataBalita()
    {

        $data['page'] = 'Laporan Rekap Data Balita';

        // if ($start_date != null and $end_date != null) {
        // $data['balita'] = $this->M_balita->all_rekap_balita();
        $start_date = $this->input->get('start_date');
        $end_date     = $this->input->get('end_date');
        $data['page'] = 'Laporan Rekap Data Balita';

        if ($start_date != null and $end_date != null) {
            $data['balita'] = $this->M_balita->all_rekap_balita($start_date, $end_date);
            $data['start_date'] = $this->input->get('start_date');
            $data['end_date'] = $this->input->get('end_date');
        } else {
            $data['balita'] = array();
            $data['start_date'] = null;
            $data['end_date'] = null;
        }
        // echo json_encode($data['balita']);
        // exit;
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

        // // Mendapatkan logo dari file
        $logo = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();

        $logoPath = 'assets/img/luwu.png'; // Ganti dengan path menuju logo Anda
        $logo->setPath($logoPath);
        $logo->setHeight(50); // Atur tinggi logo
        $logo->setCoordinates('A2'); // Tentukan koordinat (kolom dan baris) di mana logo akan ditempatkan
        $logo->setWorksheet($spreadsheet->getActiveSheet());

        $logo2 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();

        $logoPath2 = 'assets/img/login-img.png'; // Ganti dengan path menuju logo Anda
        $logo2->setPath($logoPath2);
        $logo2->setHeight(50); // Atur tinggi logo
        $logo2->setCoordinates('H2'); // Tentukan koordinat (kolom dan baris) di mana logo akan ditempatkan
        $logo2->setWorksheet($spreadsheet->getActiveSheet());

        // Geser header ke bawah satu baris
        $sheet->insertNewRowBefore(1, 1);


        $sheet->setCellValue('A5', "LAPORAN REKAP DATA BALITA"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->setCellValue('A6', "POSYANDU DESA MANTADULU"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('A5:H5'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A5')->getFont()->setBold(true); // Set bold kolom A1
        // Mengatur teks menjadi berada di tengah secara horizontal dan vertikal pada sel A5
        $sheet->getStyle('A5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A5')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);


        $sheet->mergeCells('A6:H6'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A6')->getFont()->setBold(true); // Set bold kolom A1
        // Mengatur teks menjadi berada di tengah secara horizontal dan vertikal pada sel A6
        $sheet->getStyle('A6')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A6')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A7', "NO"); // Set kolom A7 dengan tulisan "NO"
        $sheet->setCellValue('B7', "NIB"); // Set kolom B7 dengan tulisan "NIS"
        $sheet->setCellValue('C7', "NAMA LENGKAP"); // Set kolom C7 dengan tulisan "NAMA"
        $sheet->setCellValue('D7', "TEMPAT, TANGGAL LAHIR"); // Set kolom D7 dengan tulisan "JENIS KELAMIN"
        $sheet->setCellValue('E7', "JENIS KELAMIN");
        $sheet->setCellValue('F7', "USIA");
        $sheet->setCellValue('G7', "NAMA AYAH");
        $sheet->setCellValue('H7', "NAMA IBU");
        // $sheet->setCellValue('J7', "BERAT BADAN");
        // $sheet->setCellValue('K7', "TINGGI BADAN");
        // $sheet->setCellValue('L7', "LINGKAR KEPALA");
        // $sheet->setCellValue('M7', "LINGKAR PERUT");
        // $sheet->setCellValue('N7', "KETERANGAN");



        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $sheet->getStyle('A7')->applyFromArray($style_col);
        $sheet->getStyle('B7')->applyFromArray($style_col);
        $sheet->getStyle('C7')->applyFromArray($style_col);
        $sheet->getStyle('D7')->applyFromArray($style_col);
        $sheet->getStyle('E7')->applyFromArray($style_col);
        $sheet->getStyle('F7')->applyFromArray($style_col);
        $sheet->getStyle('G7')->applyFromArray($style_col);
        $sheet->getStyle('H7')->applyFromArray($style_col);
        // $sheet->getStyle('I7')->applyFromArray($style_col);
        // $sheet->getStyle('J7')->applyFromArray($style_col);
        // $sheet->getStyle('K7')->applyFromArray($style_col);
        // $sheet->getStyle('L7')->applyFromArray($style_col);
        // $sheet->getStyle('M7')->applyFromArray($style_col);
        // $sheet->getStyle('N7')->applyFromArray($style_col);


        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 8; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($data['balita'] as $data) { // Lakukan looping pada variabel siswa
            $sheet->setCellValue('A' . $numrow, $no);
            $sheet->setCellValue('B' . $numrow, $data->nib);
            $sheet->setCellValue('C' . $numrow, $data->nama_lengkap);
            $sheet->setCellValue('D' . $numrow, $data->tempat_lahir . ", " . $data->tanggal_lahir);
            $sheet->setCellValue('E' . $numrow, $data->jenis_kelamin);
            $sheet->setCellValue('F' . $numrow, $data->usia . " bulan");
            $sheet->setCellValue('G' . $numrow, $data->nama_ayah);
            $sheet->setCellValue('H' . $numrow, $data->nama_ibu);
            // $sheet->setCellValue('J' . $numrow, $data->berat_badan . 'Kg');
            // $sheet->setCellValue('K' . $numrow, $data->tinggi_badan . 'cm');
            // $sheet->setCellValue('L' . $numrow, $data->lingkar_kepala . 'cm');
            // $sheet->setCellValue('M' . $numrow, $data->lingkar_perut . 'cm');
            // $sheet->setCellValue('N' . $numrow, $data->keterangan);

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
            // $sheet->getStyle('J' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('K' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('L' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('M' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('N' . $numrow)->applyFromArray($style_row);

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
        // $sheet->getColumnDimension('J')->setWidth(30);
        // $sheet->getColumnDimension('K')->setWidth(30);
        // $sheet->getColumnDimension('L')->setWidth(30);
        // $sheet->getColumnDimension('M')->setWidth(30);
        // $sheet->getColumnDimension('N')->setWidth(30);

        // $sheet->getColumnDimension('I')->setWidth(30);


        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle("Laporan Balita");
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="LAPORAN REKAP DATA BALITA.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function printRekapDataBalita()
    {
        //logo 1
        $imgpath1 = base_url('assets/img/luwu.png');
        $ext1 = pathinfo($imgpath1, PATHINFO_EXTENSION);
        $img1 = file_get_contents($imgpath1);
        $data['logo1'] = 'data:image/' . $ext1 . ';base64,' . base64_encode($img1);

        //logo2
        $imgpath2 = base_url('assets/img/login-img.png');
        $ext2 = pathinfo($imgpath2, PATHINFO_EXTENSION);
        $img2 = file_get_contents($imgpath2);
        $data['logo2'] = 'data:image/' . $ext2 . ';base64,' . base64_encode($img2);

        // $start_date = $this->input->get('start_date');
        // $end_date     = $this->input->get('end_date');
        $data['page'] = 'Laporan Rekap Data Balita';

        // if ($start_date != null and $end_date != null) {
        // $data['balita'] = $this->M_balita->all_rekap_balita();
        $start_date = $this->input->get('start_date');
        $end_date     = $this->input->get('end_date');
        $data['page'] = 'Laporan Rekap Data Balita';

        if (
            $start_date != null and $end_date != null
        ) {
            $data['balita'] = $this->M_balita->all_rekap_balita($start_date, $end_date);
            $data['start_date'] = $this->input->get('start_date');
            $data['end_date'] = $this->input->get('end_date');
        } else {
            $data['balita'] = array();
            $data['start_date'] = null;
            $data['end_date'] = null;
        }

        // $data['start_date'] = $this->input->get('start_date');
        // $data['end_date'] = $this->input->get('end_date');
        // } else {
        //     $data['kematian'] = array();
        //     $data['start_date'] = null;
        //     $data['end_date'] = null;
        // }
        // Load the view 
        $this->load->view('content/Laporan/Balita/Rekap/print/rekapbalita', $data);
    }
}
