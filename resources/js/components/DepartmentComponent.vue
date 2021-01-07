<template>
  <div>

        <table class="table table-hover">
            <thead>
            <tr>
               <th>#</th>
                <th>Department Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="(department,index) in departments" :key="department.id">
                    <td>{{ index+1 }}</td>
                    <td>{{ department.department_name }}</td>
                </tr>
            </tbody>
        </table>
  </div>



</template>

<script>
  export default {
      data() {
        return {
          departments: []
        }
      },
      created() {
      let uri = '/get_departments';
      axios.get(uri).then(response => {
        this.departments = response.data;
        console.log(response)
      });
    }
  }
</script>
