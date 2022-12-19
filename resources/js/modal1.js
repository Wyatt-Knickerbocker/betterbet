window.openModal = function openModal(modal){
		var element = document.getElementById(modal);
		
	element.classList.remove("invisible");
	}
	
window.closeModal = function closeModal(modal){
	var element = document.getElementById(modal);
		
	element.classList.add("invisible");
}