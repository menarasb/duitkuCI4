<?php
 
namespace App\Models;
 
use CodeIgniter\Model;

 
class SummaryModel extends Model {

    public function resultPerMonth($id = false)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM 
        (SELECT a.bulan,a.angka,b.sumPemasukanRek,b.sumPengeluaranRek,b.sisaRek,c.sumPemasukanTunai,c.sumPengeluaranTunai,c.sisaTunai,(b.sisaRek+c.sisaTunai) as sisaTotal
        FROM bulan a
        LEFT JOIN (SELECT substr(date,6,2) as bulan,SUM(pemasukan) as sumPemasukanRek,SUM(pengeluaran) as sumPengeluaranRek, (SUM(pemasukan)-SUM(pengeluaran)) as sisaRek FROM rekening WHERE substr(date,1,4) = '2020'  GROUP BY substr(date,6,2)) b ON b.bulan = a.angka
        LEFT JOIN (SELECT substr(date,6,2) as bulan,SUM(pemasukan) as sumPemasukanTunai,SUM(pengeluaran) as sumPengeluaranTunai, (SUM(pemasukan)-SUM(pengeluaran)) as sisaTunai FROM tunai WHERE substr(date,1,4) = '2020'  GROUP BY substr(date,6,2)) c ON c.bulan = a.angka) x
        UNION
        SELECT * FROM (
        SELECT 'grandTotal','total',sum(b.sumPemasukanRek),sum(b.sumPengeluaranRek),sum(b.sisaRek),sum(c.sumPemasukanTunai),sum(c.sumPengeluaranTunai),sum(c.sisaTunai),sum((b.sisaRek+c.sisaTunai)) as sisaTotal
        FROM bulan a
        LEFT JOIN (SELECT substr(date,6,2) as bulan,SUM(pemasukan) as sumPemasukanRek,SUM(pengeluaran) as sumPengeluaranRek, (SUM(pemasukan)-SUM(pengeluaran)) as sisaRek FROM rekening WHERE substr(date,1,4) = '2020') b ON b.bulan = a.angka
        LEFT JOIN (SELECT substr(date,6,2) as bulan,SUM(pemasukan) as sumPemasukanTunai,SUM(pengeluaran) as sumPengeluaranTunai, (SUM(pemasukan)-SUM(pengeluaran)) as sisaTunai FROM tunai WHERE substr(date,1,4) = '2020') c ON c.bulan = a.angka) y
        ORDER by 2");
        return $query;
    }
} 