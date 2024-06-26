<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Notes</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
    <header id="header">
        <div class="logo"><img class="logo"src="<?php echo e(asset('images/notes/Design sans titre (56).png')); ?>"></div>
        <div class="icons">
            <div class="user-icon" ><a href="<?php echo e(route('user.profile', ['id' => Auth::user()->id])); ?>">
                <i class="fas fa-user"></i>
            </a></div>
            <div class="notification-icon"><i class="fas fa-bell"></i></div>
            <div><i class="fa-solid fa-right-from-bracket"></i></div>
        </div>
    </header>
    <div class="search-container">
        <input type="text" id="search-input" placeholder="Search..." oninput="searchNotes()">
        <i class="fas fa-search"></i>
    </div>
    <div><a href="<?php echo e(route('notes.add')); ?>" id="add-note-btn" class="add-note-btn">Add Note</a></div>
    <div class="container">
    <div class="content">
        <div id="notes-container">
            <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('notes.detail', ['id' => $note->id])); ?>" class="note-link">
                <div class="note" data-topic="<?php echo e($note->topic->name); ?>">
                    <div class="note-container">
                        
                         <div class="user-info">
                            <div class="user-img">
                                <?php if($note->user->photo_de_profil): ?>
                                    <img  src="<?php echo e(asset('storage/' . $note->user->photo_de_profil)); ?>" alt="Photo de profil de <?php echo e($note->user->first_name); ?>">
                                <?php endif; ?>
                            </div>
                            <?php if($note->user): ?>
                            <p class="user-name"><?php echo e($note->user->first_name); ?> <?php echo e($note->user->family_name); ?></p>
                            <?php endif; ?>
                         </div>
                         
                         <div class="note-rating">
                            <i class="fa-regular fa-star" data-rating="1"></i>
                            <i class="fa-regular fa-star" data-rating="2"></i>
                            <i class="fa-regular fa-star" data-rating="3"></i>
                            <i class="fa-regular fa-star" data-rating="4"></i>
                            <i class="fa-regular fa-star" data-rating="5"></i>
                        </div>
                        <div class="note-actions">
                            <i class="fa-regular fa-floppy-disk"></i>
                            <i class="fa-solid fa-share"></i>
                            <i class="fa-solid fa-triangle-exclamation"></i>
                        </div>
                    </div>
                    <hr/>

                    <div class="note-details">
                        <h3 class="note-title"><?php echo e($note->title); ?></h3>
                        <p class="note-topic-id">Topic: <?php echo e($note->topic->name); ?></p>
                    </div>
                    
                    <div class="image-container">
                       <img src="<?php echo e(asset('' . $note->photo)); ?>" alt="Photo de la note">
                    </div>
                    
                    <div class="more-details">
                        <button class="see-more-button">
                            See More<i class="fas fa-arrow-right"></i>
                        </button> 
                    </div>
                   
                    
                </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    </div>
    
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    
    
    <script>
        

       // JavaScript for rating functionality
       document.querySelectorAll('.note-rating i').forEach(star => {
       star.addEventListener('click', () => {
       const rating = parseInt(star.getAttribute('data-rating'));

       // Remove the 'star-filled' class from all stars
       document.querySelectorAll('.note-rating i').forEach(star => {
       star.classList.remove('star-filled');
       });

       // Add the 'star-filled' class for the clicked star and its following siblings
       for (let i = rating; i > 0; i--) {
       document.querySelector(`.note-rating i[data-rating="${i}"]`).classList.add('star-filled');
       }

       // If the clicked star is the first star, remove the 'star-filled' class if it has one
       if (rating === 1) {
       star.classList.toggle('star-filled');
       }
       });
       });

        // Prevent redirection when clicking on icons, rating, or user elements
       document.querySelectorAll('.note-rating i, .note-actions i, .user-info i, .user-info .user-name').forEach(element => {
       element.addEventListener('click', (event) => {
       event.preventDefault(); // Prevent the default behavior
       });
       });

        
       
         // JavaScript for toggling the submit button
        const textarea = document.querySelector('.comment-textarea');
        const submitButton = document.querySelector('.comment-submit-button');
        textarea.addEventListener('input', () => {
        if (textarea.value.length > 0) {
            submitButton.style.display = 'block';
        } else {
            submitButton.style.display = 'none';
        }
        });
        
       
       
     
   // JavaScript for search functionality by topic, title, and keywords
   function searchNotes() {
        const searchTerm = document.getElementById('search-input').value.toLowerCase();
        const notes = document.querySelectorAll('.note');

        notes.forEach(note => {
            const title = note.querySelector('.note-title').textContent.toLowerCase();
            const topic = note.querySelector('.note-topic-id').textContent.toLowerCase();
            const name = note.querySelector('.user-name').textContent.toLowerCase();
            // You can add more selectors for other attributes like keywords if needed

            if (title.includes(searchTerm) || topic.includes(searchTerm) || name.includes(searchTerm)) {
                note.style.display = 'block';
            } else {
                note.style.display = 'none';
            }
        });
    }
    
    document.getElementById('search-input').addEventListener('input', searchNotes);

    


    </script>
</body>
</html><?php /**PATH C:\Users\Lenovo\OneDrive\Bureau\pfa_v2-pfav2\resources\views/notes/display-note.blade.php ENDPATH**/ ?>