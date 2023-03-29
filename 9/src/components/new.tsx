import styles from "@/styles/New.module.css";

export default function NewEntry(props: { HandleSubmit: any }) {
  return (
    <form className={styles.form} onSubmit={props.HandleSubmit}>
      <input type="text" id="new-todo-input" name="content" required />

      <button type="submit">Submit</button>
    </form>
  );
}
