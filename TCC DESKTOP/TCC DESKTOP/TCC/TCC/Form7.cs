using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Threading;
using MySql.Data.MySqlClient;

namespace TCC
{
    public partial class Form7 : Form
    {
        Thread nt;
        MySqlConnection con;
        public Form7()
        {
            InitializeComponent();
            try
            {
                con = new MySqlConnection("server=143.106.241.3;port=3306;User ID= cl200250;database= cl200250;password=cl*31012005");
            }
            catch
            {
                MessageBox.Show("Houve um erro ao realizar a conexão");
            }
        }
        public bool VerificaCampos()
        {
            if (textBox1.Text == "")
            {
                return false;
            }
            if (textBox2.Text == "")
            {
                return false;
            }
            if (textBox3.Text == "")
            {
                return false;
            }
            if (comboBox1.Text == "")
            {
                return false;
            }
            return true;
        }
        private void Form7_Load(object sender, EventArgs e)
        {
            try
            {
                con.Open();
                MySqlCommand queryBuscaFuncionarios = new MySqlCommand("SELECT chapa, nome FROM Funcionarios", con);
                MySqlDataReader resultado = queryBuscaFuncionarios.ExecuteReader();
                while (resultado.Read())
                {
                    comboBox1.Items.Add(resultado["chapa"].ToString());
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.ToString());
            }
            finally
            {
                con.Close();
            }

        }

        private void button1_Click(object sender, EventArgs e)
        {
            this.Close();
            nt = new Thread(novoForm2);
            nt.SetApartmentState(ApartmentState.STA);
            nt.Start();
        }
        private void novoForm2()
        {
            Application.Run(new Form2());
        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void button4_Click(object sender, EventArgs e)
        {
            OpenFileDialog dialog = new OpenFileDialog();

            dialog.Title = "Abrir Foto";
            dialog.Filter = "JPG (*.jpg)|*.jpg" + "|All files (*.*)|*.*";

            if (dialog.ShowDialog() == DialogResult.OK)
            {
                try
                {
                    pictureBox2.Image = new Bitmap(dialog.OpenFile());

                }
                catch (Exception ex)
                {
                    MessageBox.Show("Não foi possivel carregar a foto: " + ex.Message);
                }
            }
            dialog.Dispose();
        }

        private byte[] ConverterFotoParaByteArray()
        {
            using (var stream = new System.IO.MemoryStream())
            {
                pictureBox1.Image.Save(stream, System.Drawing.Imaging.ImageFormat.Jpeg);
                stream.Seek(0, System.IO.SeekOrigin.Begin);
                byte[] bArray = new byte[stream.Length];
                stream.Read(bArray, 0, System.Convert.ToInt32(stream.Length));
                return bArray;
            }
        
    }

        private void pictureBox2_Click(object sender, EventArgs e)
        {
            OpenFileDialog dialog = new OpenFileDialog();

            dialog.Title = "Abrir Foto";
            dialog.Filter = "JPG (*.jpg)|*.jpg" + "|All files (*.*)|*.*";

            if (dialog.ShowDialog() == DialogResult.OK)
            {
                try
                {
                    pictureBox1.Image = new Bitmap(dialog.OpenFile());

                }
                catch (Exception ex)
                {
                    MessageBox.Show("Não foi possivel carregar a foto: " + ex.Message);

                }

            }
            dialog.Dispose();

        
    }

        private void button2_Click(object sender, EventArgs e)
        {
            {
                con.Open();
                MySqlCommand insere2 = new MySqlCommand("INSERT INTO Funcionarios (nome, idade, sexo , senha,nacionalidade ) " +
                    "VALUES ('" + textBox1.Text + "','" + textBox3.Text + "','" + textBox4.Text + "','" + textBox5.Text + "','" +textBox2.Text + "')", con);
                insere2.ExecuteNonQuery();
                MessageBox.Show("Funcionario cadastrado");
                con.Close();
            }
        }

        private void comboBox1_SelectedIndexChanged(object sender, EventArgs e)
        {
            try
            {
                con.Open();
                MySqlCommand queryBuscaFuncionario = new MySqlCommand("SELECT chapa, nome, idade,sexo,nacionalidade FROM Funcionarios WHERE chapa ='" + comboBox1.SelectedItem.ToString() + "'", con);
                MySqlDataReader resultado = queryBuscaFuncionario.ExecuteReader();

                if (resultado.Read())
                {
                    label7.Text = resultado["idade"].ToString();
                    label8.Text = resultado["nome"].ToString();
                    label10.Text = resultado["sexo"].ToString();
                    label11.Text = resultado["nacionalidade"].ToString();
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.ToString());
            }
            finally
            {
                con.Close();
            }
        }

        private void panel1_Paint(object sender, PaintEventArgs e)
        {

        }

        private void button3_Click(object sender, EventArgs e)
        {
            con.Open();
            MySqlCommand queryDeletaFuncionario = new MySqlCommand("DELETE FROM Funcionarios WHERE chapa = '" +comboBox1.Text+ "'", con);
            queryDeletaFuncionario.ExecuteNonQuery();

            MessageBox.Show("Funcionario excluído com sucesso");
            con.Close();


        }

        private void label5_Click(object sender, EventArgs e)
        {

        }
    }
}
