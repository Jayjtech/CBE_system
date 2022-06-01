const toggleModals = () => 
{
    document.querySelector('.modals')
    .classList.toggle('modals_hidden');
};
document.querySelector('#show-modals')
.addEventListener('click', toggleModals);