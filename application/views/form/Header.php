<?php echo form_open('form/simpan'); ?>
<center>
        <h1><?php echo $form['TITLE']; ?>
</h1>
        <table border="1" cellspacing="0" cellpadding="5" width="80%">
            <tr>
                <td width="200">NAMA <?php echo $place['TYPE']; ?> </td>
                <td colspan="3"><?php echo $place['NAMA'] ?></td>
            </tr>
            <tr>
                <td>JENIS <?php echo $place['TYPE']; ?></td>
                <td colspan="3"><?php echo $place['CATEGORY']; ?></td>
            </tr>
            <tr>
                <td>JENIS LAYANAN</td>
                <td colspan="3">RAWAT JALAN</td>
            </tr>
            <tr>
                <td>NO. RESPONDEN</td>
                <td>---</td>
                <td width="200">TANGGAL SURVEI</td>
                <td><?php echo @date('d-m-Y'); ?></td>
            </tr>
            <tr>
                <td>KODE SURVEYOR</td>
                <td>---</td>
                <td width="200">UNIT PELAYANAN</td>
                <td>---</td>
            </tr>
        </table>
        <table border="0"  width="80%">
            <tr>
                <td>
                    <p><?php echo $form['DESCRIPTION']; ?></p>
                </td>
            </tr>
        </table>
</center>
