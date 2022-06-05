<?php


class ModelReport extends CI_Model
{
    // DATA REPORT

    public function tampil()
    {
        return $this->db->get('report');
    }

    public function input($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function debit()
    {
        $debit = $this->db->query("SELECT SUM(balance) AS total FROM report WHERE MONTH(report.date) = '" . date('m') . "' AND YEAR(report.date) = '" . date('Y') . "' AND category = 'Pengeluaran'");
        return $debit->row()->total;
    }

    public function credit()
    {
        $credit = $this->db->query("SELECT SUM(price) AS total FROM invoice WHERE MONTH(invoice.date) = '" . date('m') . "' AND YEAR(invoice.date) = '" . date('Y') . "' AND status = 'Paid'");
        return $credit->row()->total;
    }


    public function bersih()
    {
        $debit = $this->db->query("SELECT SUM(balance) AS total FROM report WHERE MONTH(report.date) = '" . date('m') . "' AND YEAR(report.date) = '" . date('Y') . "' AND category = 'Pengeluaran'");

        $credit = $this->db->query("SELECT SUM(price) AS total FROM invoice WHERE MONTH(invoice.date) = '" . date('m') . "' AND YEAR(invoice.date) = '" . date('Y') . "' AND status = 'Paid'");

        $bersih = $credit->row()->total - $debit->row()->total;
        return $bersih;
    }
}
