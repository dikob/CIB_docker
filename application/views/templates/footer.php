        </div>
        <script>
            var element = document.getElementById("editor1");
 
            //If it isn't "undefined" and it isn't "null", then it exists.
            if(typeof(element) != 'undefined' && element != null){
                CKEDITOR.replace( 'editor1' );
            }
        </script>
    </body>
</html>