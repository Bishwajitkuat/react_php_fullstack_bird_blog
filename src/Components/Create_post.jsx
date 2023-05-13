import { useState, React } from "react";
import axios from "axios";

const Create_post = () => {
  const [inputs, setInput] = useState();
  const submitHandler = (e) => {
    e.preventDefault();
    axios
      .post("http://localhost:8000/api/createPost.php", inputs)
      .then((response) => alert(response.data.message));
  };
  const handleChange = (e) => {
    const name = e.target.name;
    const value = e.target.value;
    setInput((values) => ({ ...values, [name]: value }));
  };
  return (
    <div className="App">
      <form onSubmit={submitHandler}>
        <div>
          <label htmlFor="title">title</label>
          <input type="text" name="title" onChange={handleChange} id="title" />
        </div>
        <div>
          <label htmlFor="body">Body</label>
          <input
            type="textarea"
            name="body"
            onChange={handleChange}
            id="body"
          />
        </div>
        <div>
          <label htmlFor="author">Author</label>
          <input
            type="text"
            name="author"
            onChange={handleChange}
            id="author"
          />
        </div>
        <div>
          <label htmlFor="category">Catetory</label>
          <input
            type="text"
            name="category"
            onChange={handleChange}
            id="category"
          />
        </div>
        <div>
          <label htmlFor="img">Img address</label>
          <input type="text" name="img" onChange={handleChange} id="img" />
        </div>
        <input type="submit" value="submit" />
      </form>
    </div>
  );
};

export default Create_post;
