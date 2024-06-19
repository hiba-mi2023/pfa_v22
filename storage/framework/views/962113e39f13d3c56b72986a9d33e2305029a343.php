<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note List</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<body>
    <div class="form-container">
        <h1>Notes List</h1>
            <form action="<?php echo e(route('notes.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div>
                    <label for="title">Titre : </label>
                    <input type="text" class="form-control" id="title" name="title" required>
                    <div id="titleError" class="error-message"></div>
                </div>
                <div>
                    <label for="topic">Module : </label>
                    <input type="text" class="form-control" id="topic" name="topic" required>
                    <div id="moduleError" class="error-message"></div>
                </div>
                <div>
                    <label for="keywords">Mot Clé : </label>
                    <input type="text" class="form-control" id="keywords" name="keywords" required>
                    <div id="keywordsError" class="error-message"></div>
                </div>
                <div>
                    <label for="description">Description : </label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                    <div id="descriptionError" class="error-message"></div>
                </div>
                <div>
                    <label for="discipline_id">Discipline</label>
                    <select class="form-control" id="discipline_id" name="discipline_id" required>
                        <?php $__currentLoopData = $disciplines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discipline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($discipline->id); ?>"><?php echo e($discipline->discipline); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>                
                <div>
                    <label for="photo">Photo : </label>
                    <input type="file" class="form-control" accept=".jpg,.jpeg,.png,.svg,.webp,.tiff" id="photo" name="photo" required>
                </div>
                <button type="submit" >Ajouter Note</button>
            </form>
        <div id="notes-list">
        </div>
    </div>
  
    <script>
        $(document).ready(function () {
            $("#notes-form").on("submit", function (event) {
                event.preventDefault();
                var title = $("#title").val();
                var description = $("#description").val();
                var discipline = $("#discipline").val();
                $.ajax({
                    url: "/submit",
                    method: "POST",
                    data: {
                        title: title,
                        description: description,
                        discipline: discipline
                    },
                    success: function (note) {
                        $("#notes-list").append(`
                            <div class="note" id="note-${note.id}">
                                <h2>${note.title}</h2>
                                <p>${note.description}</p>
                                <p>Discipline: ${note.discipline}</p>
                            </div>
                        `);
                        $("#notes-form")[0].reset();
                    }
                });
            });
        });
    </script>
   
</body>
</html>  




 <?php /**PATH C:\Users\Lenovo\OneDrive\Bureau\pfa_v2-pfav2\resources\views/notes/add-note.blade.php ENDPATH**/ ?>