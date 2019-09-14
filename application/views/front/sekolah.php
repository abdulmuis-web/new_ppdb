<!-- Main content -->

<section class="content">
    
    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="sekolah">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kabupten</th>
                    <th>NPSN</th>
                    <th>Nama Sekolah</th>
                    <th>Alamat</th>
                    <th>Kuota Zonasi</th>
                    <th>Kontak</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            foreach ($sekolah as $sekolah) {
            ?>
                <tr>
                    <td width="5%"><?= $no++; ?></td>
                    <td><?= $sekolah['kabupaten']; ?></td>
                    <td><?= $sekolah['npsn']; ?></td>
                    <td><?= $sekolah['nama_sekolah']; ?></td>
                    <td><?= $sekolah['alamat']; ?></td>
                    <td><?= $sekolah['kuota']; ?></td>
                    <td><?= $sekolah['kontak']; ?></td>
                </tr>
            <?php
            }
            ?>    
            
            </tbody>
        </table>
    </div>
    
<!-- /.box -->
</section>
<!-- /.content -->
</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->