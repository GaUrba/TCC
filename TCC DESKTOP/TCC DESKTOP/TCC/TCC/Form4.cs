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
using System.IO;
using static System.Windows.Forms.VisualStyles.VisualStyleElement;

namespace TCC
{
    
    public partial class Form4 : Form
    {
        Thread nt;
        MySqlConnection con;
        MySqlCommand command;
        MySqlConnection connection = new MySqlConnection("server=143.106.241.3;port=3306;User ID= cl200250;database= cl200250;password=cl*31012005");
        public Form4()
        {
            try
            {
                con = new MySqlConnection("server=143.106.241.3;port=3306;User ID= cl200250;database= cl200250;password=cl*31012005");
            }
            catch
            {
                MessageBox.Show("Houve um erro ao realizar a conexão");
            }

            InitializeComponent();
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

        private void pictureBox2_Click(object sender, EventArgs e)
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
                pictureBox2.Image.Save(stream, System.Drawing.Imaging.ImageFormat.Jpeg);
                stream.Seek(0, System.IO.SeekOrigin.Begin);
                byte[] bArray = new byte[stream.Length];
                stream.Read(bArray, 0, System.Convert.ToInt32(stream.Length));
                return bArray;
            }
        
    }

        private void pictureBox1_Click(object sender, EventArgs e)
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

        private void button2_Click(object sender, EventArgs e)
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

        private void button5_Click(object sender, EventArgs e)
        {
            {
MemoryStream ms = new MemoryStream();
                pictureBox2.Image.Save(ms, pictureBox2.Image.RawFormat);
                byte[] img = ms.ToArray();
                String insertQuery = "INSERT INTO produto (nome, descricao, preco , imagem) VALUES(@nome,@desc,@preco,@img)";
                connection.Open();
                command = new MySqlCommand(insertQuery, connection);
                command.Parameters.Add("@nome", MySqlDbType.VarChar, 255);
                command.Parameters.Add("@desc", MySqlDbType.Text);
                command.Parameters.Add("@preco", MySqlDbType.Decimal);
                command.Parameters.Add("@img", MySqlDbType.LongBlob);
                command.Parameters["@nome"].Value = textBox1.Text;
                command.Parameters["@desc"].Value = textBox3.Text;
                command.Parameters["@preco"].Value = textBox5.Text;
                command.Parameters["@img"].Value = img;
                if (command.ExecuteNonQuery() == 1)
                {
                    MessageBox.Show("produto cadastrado");
                }

                connection.Close();
            }
        }

        private void panel1_Paint(object sender, PaintEventArgs e)
        {

        }

        private void Form4_Load(object sender, EventArgs e)
        {
            try
            {
                con.Open();
                MySqlCommand queryBuscaFuncionarios = new MySqlCommand("SELECT nome, id FROM produto", con);
                MySqlDataReader resultado = queryBuscaFuncionarios.ExecuteReader();
                while (resultado.Read())
                {
                    comboBox2.Items.Add(resultado["nome"].ToString());
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

        private void comboBox2_SelectedIndexChanged(object sender, EventArgs e)
        {
            try
            {
                con.Open();
                MySqlCommand queryBuscaFuncionario = new MySqlCommand("SELECT id, nome, descricao,preco FROM produto WHERE nome ='" + comboBox2.SelectedItem.ToString() + "'", con);
                MySqlDataReader resultado = queryBuscaFuncionario.ExecuteReader();

                if (resultado.Read())
                {
                    textBox7.Text = resultado["nome"].ToString();
                    textBox4.Text = resultado["descricao"].ToString();
                    label2.Text = resultado["id"].ToString();
                    textBox6.Text = resultado["preco"].ToString();
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

        private void textBox4_TextChanged(object sender, EventArgs e)
        {

        }

        private void button3_Click(object sender, EventArgs e)
        {
            con.Open();
            MySqlCommand queryDeletaProduto = new MySqlCommand("DELETE FROM produto WHERE nome = '" + comboBox2.Text + "'", con);
            queryDeletaProduto.ExecuteNonQuery();

            MessageBox.Show("Produto excluído com sucesso");
            con.Close();
        }
    }
}
