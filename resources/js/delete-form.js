const deleteForm = document.querySelectorAll('.delete-form');

deleteForm.forEach( form => {
form.addEventListener('submit' , e => {
    e.preventDefault();
    const ProjectName = form.dataset.name;
    const isConfirmed = confirm(`Sei sicuro di voler eliminare ${ProjectName}`);
    if(isConfirmed) form.submit();
})
})