document.addEventListener("DOMContentLoaded", function () {
  // Initialize the dataTable
  let dataTable = new simpleDatatables.DataTable(
    document.getElementById("table1")
  );

  // Move "per page dropdown" selector element out of label
  // to make it work with bootstrap 5. Add bs5 classes.
  function adaptPageDropdown() {
    const selector = dataTable.wrapper.querySelector(".dataTable-selector");
    selector.parentNode.parentNode.insertBefore(selector, selector.parentNode);
    selector.classList.add("form-select");
  }

  // Patch "per page dropdown" and pagination after table rendered
  dataTable.on("datatable.init", () => {
    adaptPageDropdown();
  });

  // Function to filter data based on date range
  function filterDataByDateRange(startDate, endDate) {
    const rows = dataTable.activeRows;
    for (let i = 0; i < rows.length; i++) {
      const tanggalKegiatan = rows[i].cells[3].innerText.trim(); // Kolom tanggal kegiatan (index 3)
      const kegiatanDate = parseDate(tanggalKegiatan, "d-m-Y");
      if (kegiatanDate < startDate || kegiatanDate > endDate) {
        rows[i].style.display = "none"; // Sembunyikan baris jika tanggal tidak berada dalam rentang yang dipilih
      } else {
        rows[i].style.display = ""; // Tampilkan kembali baris jika tanggal berada dalam rentang yang dipilih
      }
    }
  }

  // Function to reset filters and show all rows
  function resetFilters() {
    const rows = dataTable.activeRows;
    for (let i = 0; i < rows.length; i++) {
      rows[i].style.display = ""; // Tampilkan kembali semua baris
    }
    document.getElementById("date_range").value = ""; // Reset nilai input tanggal
  }

  // Function to parse date with custom format
  function parseDate(dateString, format) {
    const dateParts = dateString.split("-");
    const day = parseInt(dateParts[0], 10);
    const month = parseInt(dateParts[1], 10);
    const year = parseInt(dateParts[2], 10);
    return new Date(year, month - 1, day);
  }

  // Function to initialize Flatpickr for date range input
  function initFlatpickr() {
    const dateRangeInput = document.getElementById("date_range");
    flatpickr(dateRangeInput, {
      mode: "range",
      dateFormat: "d-m-Y",
      onClose: function (selectedDates, dateStr, instance) {
        if (selectedDates.length === 2) {
          const startDate = selectedDates[0];
          const endDate = selectedDates[1];
          filterDataByDateRange(startDate, endDate);
        }
      },
      onReady: function (selectedDates, dateStr, instance) {
        if (selectedDates.length === 2) {
          const startDate = selectedDates[0];
          const endDate = selectedDates[1];
          filterDataByDateRange(startDate, endDate);
        }
      },
    });
  }

  // Initialize Flatpickr for date range input
  initFlatpickr();

  // Event listener for filter button click
  document.getElementById("btn-filter").addEventListener("click", function () {
    const dateRange = document.getElementById("date_range").value;
    if (dateRange !== "") {
      const [startDate, endDate] = dateRange.split(" to ");
      filterDataByDateRange(
        parseDate(startDate, "d-m-Y"),
        parseDate(endDate, "d-m-Y")
      );
    } else {
      resetFilters();
    }
  });

  // Event listener for reset button click
  document.getElementById("btn-reset").addEventListener("click", function () {
    resetFilters();
  });

  // Event listener for print button click
  document.getElementById("btn-print").addEventListener("click", function () {
    // Add your logic to handle print button click
    // For example, you can open a print-friendly version of the table or generate a PDF.
    const dateRange = document.getElementById("date_range").value;

    // Construct the dynamic URL using base_url
    const dynamicUrl = `${base_url}/cetak-data/kegiatan/print/${encodeURIComponent(dateRange)}`;

    // Redirect the user to the dynamic URL
    window.location.href = dynamicUrl;
  });
});
