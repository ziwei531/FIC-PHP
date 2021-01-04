function deleteConfirm(id) {
    const response = confirm(`Confirm deleting book record #${id}?`);

    if(response) {
        document.location.href = "delete-data.php?id=" + id;
    }
}