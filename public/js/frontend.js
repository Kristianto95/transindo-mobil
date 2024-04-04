$(function () {
    $(document).ready(function () {
        $("#tanggal_sewa, #tanggal_kembali").on("change", function () {
            let tanggalSewa = new Date($("#tanggal_sewa").val());
            let tanggalKembali = new Date($("#tanggal_kembali").val());
            let harga = $("#sewa_per_hari").val().replace(/\./g, "");
            console.log(harga);

            if (
                !isNaN(tanggalSewa.getTime()) &&
                !isNaN(tanggalKembali.getTime())
            ) {
                let oneDay = 24 * 60 * 60 * 1000; // Satu hari dalam milidetik
                let lamaSewa = Math.round(
                    Math.abs((tanggalKembali - tanggalSewa) / oneDay)
                ); // Hitung berapa hari antara kedua tanggal
                $("#lama_sewa").val(lamaSewa); // Tetapkan nilai lamaSewa ke input
                let totalBiaya = lamaSewa * harga;
                $("#total_biaya").val(
                    parseFloat(totalBiaya).toLocaleString("id-ID")
                );
            }
        });
    });
    $(document).ready(function () {
        var navListItems = $("div.setup-panel div a"),
            allWells = $(".setup-content"),
            allNextBtn = $(".nextBtn"),
            allPrevBtn = $(".prevBtn");

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr("href")),
                $item = $(this);

            if (!$item.hasClass("disabled")) {
                navListItems.removeClass("btn-primary").addClass("btn-default");
                $item.addClass("btn-primary");
                allWells.hide();
                $target.show();
                $target.find("input:eq(0)").focus();
            }
        });

        allPrevBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                prevStepWizard = $(
                    'div.setup-panel div a[href="#' + curStepBtn + '"]'
                )
                    .parent()
                    .prev()
                    .children("a");

            prevStepWizard.removeAttr("disabled").trigger("click");
        });

        allNextBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $(
                    'div.setup-panel div a[href="#' + curStepBtn + '"]'
                )
                    .parent()
                    .next()
                    .children("a"),
                curInputs = curStep.find(
                    "input[type='text'],input[type='url']"
                ),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i])
                        .closest(".form-group")
                        .addClass("has-error");
                }
            }

            if (isValid) nextStepWizard.removeAttr("disabled").trigger("click");
        });

        $("div.setup-panel div a.btn-primary").trigger("click");
    });

    $(document).ready(function () {
        $(".btn-sewa").click(function () {
            var merk = $(this).data("merk");
            var model = $(this).data("model");
            var sewa = $(this).data("sewa");
            var id = $(this).data("id");

            $("#mobil").val(merk);
            $("#model").val(model);
            $("#sewa_per_hari").val(sewa);
            $("#id_mobil").val(id);
        });
    });
});
