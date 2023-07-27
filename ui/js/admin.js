fetch('sidebar.html')
.then(response => response.text())
.then(data1 => {
  document.getElementById('sidebar-container').innerHTML = data1;
})
.catch(error => console.error('error fetching the sidebar.html', error));

fetch('header.html')
.then(response => response.text())
.then(data2 => {
  document.getElementById('header-container').innerHTML = data2;
})
.catch(error => console.error('error fetching the header.html', error));