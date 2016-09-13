<p>Select a CSV file containing transactions that you want imported. If the file does not adhere to the <a>default format</a>, you will have the option to map each CSV columns to a respective system column on the next step. The file will be analysed, and any errors will be reported prior to importing.</p>
  
<div class="form-group">
  <label>Import file</label>
  <div class="input-group">
    <span class="input-group-addon">
      <span class="fa fa-file fa-fw"></span>
      Select file
    </span>
    <input type="text" class="form-control" name="file" />
  </div>
  <input type="file">
</div>

<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
    <span class="sr-only">60% Complete</span>
  </div>
</div>

<button class="btn btn-primary disabled" disabled>
  <span class="fa fa-chevron-right"></span>
  Next
</button>
