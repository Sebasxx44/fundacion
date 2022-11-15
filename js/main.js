
  function deletePerson(){
    swal({
        title: "Realmente quiere eliminar este registro?",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Registro eliminado", {
            icon: "success",
          });
        } else {
          swal("Archivo a salvo");
        }
      });
    
  };

  function createUser(){
    swal("Good job!", "You clicked the button!", "success");
  }