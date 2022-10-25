let ProDate = document.getElementById('ProDate')

ProDate.addEventListener('change',(e)=>{
  let startDateVal = e.target.value;
  document.getElementById('ProDate').value = startDateVal;
// alert(startDateVal)
});


let OrderDate = document.getElementById('OrderDate')

OrderDate.addEventListener('change',(e)=>{
  let startDateVal = e.target.value;
  document.getElementById('OrderDate').value = startDateVal;
// alert(startDateVal)
})


$('#OrderDate').datepicker({ dateFormat: 'dd-mm-yy' }).val();