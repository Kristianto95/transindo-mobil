$(function () {
    let HargaMobil = "/mobil/getHarga";

    $("#id_mobil").on("change", function () {
        let id_mobil = this.value;
        if (id_mobil != "") {
            axios
                .get(HargaMobil + "/" + id_mobil)
                .then(function (res) {
                    // console.log(res.data.sewa_per_hari);
                    let hargaSewaPerHari = res.data.sewa_per_hari;
                    let priceNumber = parseFloat(hargaSewaPerHari);

                    // Ubah format angka ke format ribuan
                    let RupiahINdo = priceNumber.toLocaleString("id-ID");
                    document.getElementById("harga_sewa_perhari").value =
                        RupiahINdo;

                    document.getElementById("is_status").value =
                        res.data.is_status;
                    document.getElementById("sewa_tanggal_kembali").value =
                        res.data.tanggal_kembali;
                })
                .catch(function (err) {
                    console.error(err);
                });
        }
    });

    $("#tanggal_sewa, #tanggal_kembali").on("change", function () {
        let tanggalSewa = new Date($("#tanggal_sewa").val());
        let tanggalKembali = new Date($("#tanggal_kembali").val());
        let is_status = document.getElementById("is_status").value;
        let sewa_tanggal_kembali = document.getElementById(
            "sewa_tanggal_kembali"
        ).value;

        var t_tanggal_sewa = new Date(tanggalSewa);
        var m_tanggal_sewa = t_tanggal_sewa.getTime();
        var t_s_tanggal_kembali = new Date(sewa_tanggal_kembali);
        var m_s_tanggal_kembali = t_s_tanggal_kembali.getTime();
        console.log(m_tanggal_sewa, m_s_tanggal_kembali);
        if (is_status == 0 && m_tanggal_sewa <= m_s_tanggal_kembali) {
            alert("Model sendang di sewat pada tanggal" + sewa_tanggal_kembali);
        } else {
            let hargaSewaPerhari = parseFloat(
                $("#harga_sewa_perhari").val().replace(/\./g, "")
            );

            if (
                !isNaN(tanggalSewa.getTime()) &&
                !isNaN(tanggalKembali.getTime())
            ) {
                let oneDay = 24 * 60 * 60 * 1000; // Satu hari dalam milidetik
                let lamaSewa = Math.round(
                    Math.abs((tanggalKembali - tanggalSewa) / oneDay)
                ); // Hitung berapa hari antara kedua tanggal
                $("#lama_sewa").val(lamaSewa); // Tetapkan nilai lamaSewa ke input
                let totalBiaya = lamaSewa * hargaSewaPerhari;
                $("#total_biaya").val(
                    parseFloat(totalBiaya).toLocaleString("id-ID")
                );
            }
        }
    });
});
