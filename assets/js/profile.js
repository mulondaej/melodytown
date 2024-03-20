//Modal
// Récupération des DOM
const profiModalBtn = document.getElementById('profiModalBtn');
const modalContainer = document.getElementById('modalContainer');
const closeBtn = document.getElementById('closeBtn');

// Fonction d'affichage de conteneur modal
function openModal() {
    modalContainer.style.display = 'block';
}

// Fonction de clotûre de  conteneur modal
function closeModal() {
    modalContainer.style.display = 'none';
}

// le bouton "Supprimer" par un clic
if (profiModalBtn != null) {
    profiModalBtn.addEventListener('click', openModal);
}

// le button "fermer" par un clic
if (closeBtn != null) {
    closeBtn.addEventListener('click', closeModal);
}

// fermer le conteneur en cliquant n'importe où
if (modalContainer != null) {
    modalContainer.addEventListener("click", (e) => {
        if (e.target != modal && e.target != modalText) {
            modalContainer.style.display = "none"
        }
    });
}

////////////////////////////////

const editForm = document.getElementById('editModal');
const formEdit = document.getElementById('logFormEdits');

if (editForm != null) {
    editForm.addEventListener("click", () => {
        if (formEdit.style.display === 'none' || formEdit.style.display === '') {
            formEdit.style.display = 'block';
        } else {
            formEdit.style.display = 'none';
        }
    });
}

///////////////////////////////////////
// modification des status par un clic dans un modal form 
if (editForm != null) {
    editForm.addEventListener('click', () => {
        const updatestatus = editForm.getAttribute('updatestatus'); // on lie l'id de l'élément avec le status
        statusUpdate.value = updatestatus; // la valeur de l'élément 
        console.log(updatestatus)
    });
}


///////////////////////////////
// suppression des status par un clic dans un modal
if (profiModalBtn != null) { // le bouton n'est pas présent dans la page
    profiModalBtn.addEventListener('click', () => { // le bouton est cliqué
        const statusdeleteId = profiModalBtn.getAttribute('statusdeleteid'); // on lie l'id de l'élément avec le status
        idStatusDelete.value = statusdeleteId; // on l'enregistre l'id de l'élément avec le status
        console.log(statusdeleteId)
    });
}

/////

// pour repondre le contenu du topic dans un input textbox en modal en le quotant
let replyBtn = document.getElementsByClassName('replyBtn');

if (replyBtn != null) {
    for (let r of replyBtn) {
        r.addEventListener('click', (e) => {
            let replystatus = e.target.getAttribute('replystatus');
            commenting.value = "@" + replystatus + "\n";
            console.log(replystatus)
        });
    }
}

///////////////////////////////////////

  //PROFILE
  const coverImageUpload = document.getElementById("coverUpload");
  const coverPicture = document.getElementById("coverPicture");

  coverImageUpload.addEventListener("change", function () {
      const file = coverImageUpload.files[0];

      if (file) {
          // Create a FileReader to read the uploaded file
          const reader = new FileReader();

          reader.onload = function (e) {
              // Set the uploaded image as the cover picture source
              coverPicture.src = e.target.result;
          };

          // Read the file as a data URL
          reader.readAsDataURL(file);
      }
  });

  // Add functionality to trigger the file input when "Edit Cover" is clicked
  const editCoverButton = document.getElementById("editCover");

  editCoverButton.addEventListener("click", function () {
      coverImageUpload.click(); // Trigger the file input click event
  });

  // jsript for avatar image upload (Similar to cover image upload)
  const avatarImageUpload = document.getElementById("avatarUpload");
  const avatarImg = document.getElementById("avatar");

  avatarImageUpload.addEventListener("change", function () {
      const file = avatarImageUpload.files[0];

      if (file) {
          const reader = new FileReader();

          reader.onload = function (e) {
              avatarImg.src = e.target.result;
          };

          reader.readAsDataURL(file);
      }
  });

  const editAvatarButton = document.getElementById("editAvatar");
  if (editAvatarButton != null) {
      editAvatarButton.addEventListener("click", function () {
          avatarImageUpload.click();
      });
  }