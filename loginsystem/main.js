const columnDefs = [
    { field: "id", headerName: "ID" },
    { field: "productName", headerName: "Product Name" },
    { field: "price", headerName: "Price" },
    { field: "availability", headerName: "Availability" }
];

const gridOptions = {
    columnDefs: columnDefs,
    rowData: null,
};

// setup the grid after the page has finished loading
document.addEventListener('DOMContentLoaded', () => {
    const gridDiv = document.querySelector('#myGrid');
    new agGrid.Grid(gridDiv, gridOptions);

    // Fetch data from fetch_data.php
    fetch('fetch_data.php')
        .then(response => response.json())
        .then(data => {
            gridOptions.api.setRowData(data);
        })
        .catch(error => console.error('Error fetching data:', error));
});
