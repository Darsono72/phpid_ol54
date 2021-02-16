<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function pill_provinsi($prov_id='')
{
	$CI = & get_instance();

    $data = '';
    $CI->db->where('parent','0');
    $CI->db->order_by('nama');
    $qry = $CI->db->get('_wilayah_nkri');
  
    foreach ($qry->result() as $rows) {
        $pil=($rows->kode == $prov_id)?'selected':'';
        $data.='<option value="'.$rows->kode.'" '.$pil.'>'.$rows->nama.'</option>';   
    }

    return $data;
}

function pill_kabupaten($prov_id='',$kab_id='')
{
	$CI = & get_instance();

    $data = '';
    $CI->db->where('parent',$prov_id);
    $CI->db->order_by('nama');
    $qry = $CI->db->get('_wilayah_nkri');

    $data.='<option value="">--- Kab./Kota ---</option>';
    foreach ($qry->result() as $rows) {
        $pil=($rows->kode == $kab_id)?'selected':'';
        $data.='<option value="'.$rows->kode.'" '.$pil.'>'.$rows->nama.'</option>';   
    }

    return $data;
}

function pill_kecamatan($kab_id='',$kec_id='')
{
	$CI = & get_instance();

    $data = '';
    $CI->db->where('parent',$kab_id);
    $CI->db->order_by('nama');
    $qry = $CI->db->get('_wilayah_nkri');

    $data.='<option value="">--- Kecamatan ---</option>';
    foreach ($qry->result() as $rows) {
        $pil=($rows->kode == $kec_id)?'selected':'';
        $data.='<option value="'.$rows->kode.'" '.$pil.'>'.$rows->nama.'</option>';   
    }

    return $data;
}

function pill_desa($kec_id='',$desa_id='')
{
	$CI = & get_instance();
	
    $data = '';
    $CI->db->where('parent',$kec_id);
    $CI->db->order_by('nama');
    $qry = $CI->db->get('_wilayah_nkri');

    $data.='<option value="">--- Desa/Kelurahan ---</option>';
    foreach ($qry->result() as $rows) {
        $pil=($rows->kode == $desa_id)?'selected':'';
        $data.='<option value="'.$rows->kode.'" '.$pil.'>'.$rows->nama.'</option>';   
    }

    return $data;
}

function nm_wilayah($id='')
{
    $data = '';
    $CI->db->where('kode',$id);
    $qry = $CI->db->get('_wilayah_nkri');

    // $data.='<option value="">--- Desa/Kelurahan ---</option>';
    foreach ($qry->result() as $rows) {
        // $pil=($rows->kode == $desa_id)?'selected':'';
        $data.=$rows->nama;   
    }

    return $data;
}