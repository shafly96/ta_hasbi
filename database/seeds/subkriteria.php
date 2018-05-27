<?php

use Illuminate\Database\Seeder;

class subkriteria extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_kriteria')->insert(array(
        	array('kriteria'=>'Dokumen Legalitas dan Oragnisasi', 'sub_kriteria'=>'Memiliki Surat Izin Usaha (SIUP)'),
        	array('kriteria'=>'Dokumen Legalitas dan Oragnisasi', 'sub_kriteria'=>'Memiliki akte pendirian perusahaan'),
        	array('kriteria'=>'Dokumen Legalitas dan Oragnisasi', 'sub_kriteria'=>'Memiliki sturktur organisasi'),
        	array('kriteria'=>'Dokumen Legalitas dan Oragnisasi', 'sub_kriteria'=>'Keanggotaan pada asosiasi lainnya'),

        	array('kriteria'=>'Tenaga Kerja Galangan', 'sub_kriteria'=>'Memiliki kompetensi dan keahlian dalam proses pembangunan'),
        	array('kriteria'=>'Tenaga Kerja Galangan', 'sub_kriteria'=>'Sertifikat yang dimiliki sesuai bidang'),
        	array('kriteria'=>'Tenaga Kerja Galangan', 'sub_kriteria'=>'Kemampuan memahami prosedur kerja'),
        	array('kriteria'=>'Tenaga Kerja Galangan', 'sub_kriteria'=>'Pemahaman praktek keselamatan kerja'),
        	array('kriteria'=>'Tenaga Kerja Galangan', 'sub_kriteria'=>'Kemampuan dalam penggunaan alat'),
        	array('kriteria'=>'Tenaga Kerja Galangan', 'sub_kriteria'=>'Memahami kondisi risiko lingkungan kerja'),
        	array('kriteria'=>'Tenaga Kerja Galangan', 'sub_kriteria'=>'Memahami penanganan keadaan darurat'),

        	array('kriteria'=>'Fasilitas Galangan', 'sub_kriteria'=>'Memiliki kantor dan administrasi'),
        	array('kriteria'=>'Fasilitas Galangan', 'sub_kriteria'=>'Memiliki sarana perancangan'),
        	array('kriteria'=>'Fasilitas Galangan', 'sub_kriteria'=>'Memiliki gudang material'),
        	array('kriteria'=>'Fasilitas Galangan', 'sub_kriteria'=>'Memiliki bengkel fabrikasi dan assembly'),
        	array('kriteria'=>'Fasilitas Galangan', 'sub_kriteria'=>'Memiliki lapangan pembangunan kapal beserta peluncurannya'),
        	array('kriteria'=>'Fasilitas Galangan', 'sub_kriteria'=>'Memiliki fasilitas reparasi'),

        	array('kriteria'=>'Teknologi dan Peralatan', 'sub_kriteria'=>'Memiliki peralatan las'),
        	array('kriteria'=>'Teknologi dan Peralatan', 'sub_kriteria'=>'Memiliki peralatan bending profil'),
        	array('kriteria'=>'Teknologi dan Peralatan', 'sub_kriteria'=>'Memiliki peralatan pemotongan plat'),
        	array('kriteria'=>'Teknologi dan Peralatan', 'sub_kriteria'=>'Memiliki peralatan crane'),
        	array('kriteria'=>'Teknologi dan Peralatan', 'sub_kriteria'=>'Memiliki peralatan hidraulik'),
        	array('kriteria'=>'Teknologi dan Peralatan', 'sub_kriteria'=>'Memiliki gambar kerja'),
        	array('kriteria'=>'Teknologi dan Peralatan', 'sub_kriteria'=>'Memiliki bengkel mesin dan listrik serta pipa'),
        	array('kriteria'=>'Teknologi dan Peralatan', 'sub_kriteria'=>'Memiliki peralatan pengecatan'),

        	array('kriteria'=>'Track Record', 'sub_kriteria'=>'Memiliki pengalaman dalam pekerjaan pembangunan kapal'),
        	array('kriteria'=>'Track Record', 'sub_kriteria'=>'Rekam jejak galangan'),
        	array('kriteria'=>'Track Record', 'sub_kriteria'=>'Tidak dalam pengawasan pengadilan'),

        	array('kriteria'=>'Luasan Area Dock Yard', 'sub_kriteria'=>'Kapasitas jumlah dan luasan'),
        	array('kriteria'=>'Luasan Area Dock Yard', 'sub_kriteria'=>'Memiliki layout galangan'),

        	array('kriteria'=>'Kekuatan modal dan pembiayaan', 'sub_kriteria'=>'Memiliki modal kerja'),
        	array('kriteria'=>'Kekuatan modal dan pembiayaan', 'sub_kriteria'=>'Kemampuan dalam pembiayaan'),
        	array('kriteria'=>'Kekuatan modal dan pembiayaan', 'sub_kriteria'=>'Memiliki NPWP'),
        	array('kriteria'=>'Kekuatan modal dan pembiayaan', 'sub_kriteria'=>'Memiliki laporan neraca keuangan'),
        	array('kriteria'=>'Kekuatan modal dan pembiayaan', 'sub_kriteria'=>'Modal harus mayoritas dari dalam negeri'),

        	array('kriteria'=>'Pekerja Galangan dan Sub-Kontraktor', 'sub_kriteria'=>'Memiliki standar kemampuan yang setara'),
        	array('kriteria'=>'Pekerja Galangan dan Sub-Kontraktor', 'sub_kriteria'=>'Pemahaman yang sama di galangan'),

        	array('kriteria'=>'Keselamatan, keamanan dan lingkungan', 'sub_kriteria'=>'Memiliki prosedur dan pedoman K3 dan penanganan bahaya'),
        	array('kriteria'=>'Keselamatan, keamanan dan lingkungan', 'sub_kriteria'=>'Telah memiliki dan melakukan penilaian resiko'),
			array('kriteria'=>'Keselamatan, keamanan dan lingkungan', 'sub_kriteria'=>'Memiliki kebijakan perlindungan lingkungan'),

			array('kriteria'=>'Manajemen operasional dan proyek', 'sub_kriteria'=>'Memiliki sistem manajemen mutu ISO 9001-2008'),
			array('kriteria'=>'Manajemen operasional dan proyek', 'sub_kriteria'=>'Memiliki sistem manajemen pengendalian proyek'),
			array('kriteria'=>'Manajemen operasional dan proyek', 'sub_kriteria'=>'Memiliki organisasi proyek'),
			array('kriteria'=>'Manajemen operasional dan proyek', 'sub_kriteria'=>'Memiliki Quality Control')
		));
    }
}
