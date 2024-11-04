<script>
    function generatePDF() {
        // Implement PDF generation logic here
        alert("PDF Generated!"); // Placeholder
    }

    function handleFilterChange() {
        const filter = document.getElementById("dateFilter").value;
        if (filter === "custom") {
            document.getElementById("customDateModal").style.display = "flex";
        } else {
            window.location.href = `{{$actionRoute}}?interval=${filter}`;
        }
    }

    function closeModal() {
        document.getElementById("customDateModal").style.display = "none";
    }
</script>
