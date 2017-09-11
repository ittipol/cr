class TextEditor {
	constructor() {}

	load() {
	  tinymce.init({ selector:'textarea',plugins: ['image','code','link'], height: "500" });
	}
} 