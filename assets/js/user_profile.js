const editBtn = document.getElementById('editBtn');
const saveBtn = document.getElementById('saveBtn');
const cancelBtn = document.getElementById('cancelBtn');
const editableFields = document.querySelectorAll('#profileForm input[name="full_name"], #profileForm input[name="phone"], #profileForm select[name="year"]');
let originalData = {};

editBtn.addEventListener('click', () =>{
    originalData = {};
    editableFields.forEach(input =>{
        input.disabled = false;
        originalData[input.name] = input.value; 
    });

    editBtn.style.display = 'none';
    saveBtn.style.display = 'inline-block';
    cancelBtn.style.display = 'inline-block';
});

cancelBtn.addEventListener('click', () =>{
    editableFields.forEach(input =>{
        input.value = originalData[input.name];
        input.disabled = true;
    });

    editBtn.style.display = 'inline-block';
    saveBtn.style.display = 'none';
    cancelBtn.style.display = 'none';
});