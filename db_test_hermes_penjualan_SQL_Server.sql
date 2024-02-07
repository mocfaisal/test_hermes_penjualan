/*
 Navicat Premium Data Transfer

 Source Server         : SQL Server
 Source Server Type    : SQL Server
 Source Server Version : 16001000 (16.00.1000)
 Source Catalog        : tes_hermes_penjualan
 Source Schema         : dbo

 Target Server Type    : SQL Server
 Target Server Version : 16001000 (16.00.1000)
 File Encoding         : 65001

 Date: 07/02/2024 13:35:28
*/


-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[failed_jobs]') AND type IN ('U'))
	DROP TABLE [dbo].[failed_jobs]
GO

CREATE TABLE [dbo].[failed_jobs] (
  [id] bigint  IDENTITY(1,1) NOT NULL,
  [uuid] nvarchar(255) COLLATE Latin1_General_CI_AI  NOT NULL,
  [connection] nvarchar(max) COLLATE Latin1_General_CI_AI  NOT NULL,
  [queue] nvarchar(max) COLLATE Latin1_General_CI_AI  NOT NULL,
  [payload] nvarchar(max) COLLATE Latin1_General_CI_AI  NOT NULL,
  [exception] nvarchar(max) COLLATE Latin1_General_CI_AI  NOT NULL,
  [failed_at] datetime DEFAULT getdate() NOT NULL
)
GO

ALTER TABLE [dbo].[failed_jobs] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
SET IDENTITY_INSERT [dbo].[failed_jobs] ON
GO

SET IDENTITY_INSERT [dbo].[failed_jobs] OFF
GO


-- ----------------------------
-- Table structure for m_product
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[m_product]') AND type IN ('U'))
	DROP TABLE [dbo].[m_product]
GO

CREATE TABLE [dbo].[m_product] (
  [id] bigint  IDENTITY(1,1) NOT NULL,
  [product_name] nvarchar(30) COLLATE Latin1_General_CI_AI  NOT NULL,
  [product_code] nvarchar(18) COLLATE Latin1_General_CI_AI  NOT NULL,
  [price] float(53)  NOT NULL,
  [currency] nvarchar(5) COLLATE Latin1_General_CI_AI  NOT NULL,
  [discount] float(53)  NOT NULL,
  [dimension] nvarchar(50) COLLATE Latin1_General_CI_AI  NOT NULL,
  [unit] nvarchar(5) COLLATE Latin1_General_CI_AI  NOT NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[m_product] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of m_product
-- ----------------------------
SET IDENTITY_INSERT [dbo].[m_product] ON
GO

INSERT INTO [dbo].[m_product] ([id], [product_name], [product_code], [price], [currency], [discount], [dimension], [unit], [created_at], [updated_at]) VALUES (N'1', N'So klin Pewangi', N'SKUSOKLINP00000001', N'15000', N'IDR', N'10', N'13 cm x 10 cm', N'PCS', N'2024-02-06 06:42:02.000', N'2024-02-06 08:29:55.787')
GO

INSERT INTO [dbo].[m_product] ([id], [product_name], [product_code], [price], [currency], [discount], [dimension], [unit], [created_at], [updated_at]) VALUES (N'3', N'So Klin Liquid', N'SKUSKILNL', N'18000', N'IDR', N'2', N'13 cm x 10 cm', N'PCS', N'2024-02-06 06:42:02.000', N'2024-02-06 08:30:03.427')
GO

INSERT INTO [dbo].[m_product] ([id], [product_name], [product_code], [price], [currency], [discount], [dimension], [unit], [created_at], [updated_at]) VALUES (N'4', N'GIV Ungu', N'SKUGIVUNGU00000001', N'15000', N'IDR', N'4', N'10cm x 15cm', N'PCS', N'2024-02-06 07:02:15.667', N'2024-02-06 09:06:35.537')
GO

INSERT INTO [dbo].[m_product] ([id], [product_name], [product_code], [price], [currency], [discount], [dimension], [unit], [created_at], [updated_at]) VALUES (N'6', N'Sunlight', N'SKUSUNLIGH00000001', N'12000', N'IDR', N'2', N'15cm x 15cm', N'PCS', N'2024-02-06 07:08:08.487', N'2024-02-06 07:08:08.487')
GO

INSERT INTO [dbo].[m_product] ([id], [product_name], [product_code], [price], [currency], [discount], [dimension], [unit], [created_at], [updated_at]) VALUES (N'9', N'GIV Merah', N'SKUGIVMERA00000001', N'11000', N'IDR', N'3', N'12cm x 10cm', N'PCS', N'2024-02-06 09:06:16.477', N'2024-02-06 09:06:16.477')
GO

SET IDENTITY_INSERT [dbo].[m_product] OFF
GO


-- ----------------------------
-- Table structure for migrations
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[migrations]') AND type IN ('U'))
	DROP TABLE [dbo].[migrations]
GO

CREATE TABLE [dbo].[migrations] (
  [id] int  IDENTITY(1,1) NOT NULL,
  [migration] nvarchar(255) COLLATE Latin1_General_CI_AI  NOT NULL,
  [batch] int  NOT NULL
)
GO

ALTER TABLE [dbo].[migrations] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of migrations
-- ----------------------------
SET IDENTITY_INSERT [dbo].[migrations] ON
GO

INSERT INTO [dbo].[migrations] ([id], [migration], [batch]) VALUES (N'1', N'2014_10_12_000000_create_users_table', N'1')
GO

INSERT INTO [dbo].[migrations] ([id], [migration], [batch]) VALUES (N'2', N'2014_10_12_100000_create_password_reset_tokens_table', N'1')
GO

INSERT INTO [dbo].[migrations] ([id], [migration], [batch]) VALUES (N'3', N'2019_08_19_000000_create_failed_jobs_table', N'1')
GO

INSERT INTO [dbo].[migrations] ([id], [migration], [batch]) VALUES (N'4', N'2019_12_14_000001_create_personal_access_tokens_table', N'1')
GO

INSERT INTO [dbo].[migrations] ([id], [migration], [batch]) VALUES (N'5', N'2024_02_05_082937_create_product_table', N'1')
GO

INSERT INTO [dbo].[migrations] ([id], [migration], [batch]) VALUES (N'6', N'2024_02_05_082954_create_transaction_table', N'1')
GO

INSERT INTO [dbo].[migrations] ([id], [migration], [batch]) VALUES (N'7', N'2024_02_05_082958_create_transaction_detail_table', N'1')
GO

INSERT INTO [dbo].[migrations] ([id], [migration], [batch]) VALUES (N'8', N'2024_02_05_120609_update_transaction_table', N'1')
GO

INSERT INTO [dbo].[migrations] ([id], [migration], [batch]) VALUES (N'9', N'2024_02_05_202935_update_transaction_table', N'1')
GO

INSERT INTO [dbo].[migrations] ([id], [migration], [batch]) VALUES (N'10', N'2024_02_05_203332_update_transaction_detail_table', N'1')
GO

INSERT INTO [dbo].[migrations] ([id], [migration], [batch]) VALUES (N'11', N'2024_02_06_060523_update_transaction_detail_table', N'1')
GO

SET IDENTITY_INSERT [dbo].[migrations] OFF
GO


-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[password_reset_tokens]') AND type IN ('U'))
	DROP TABLE [dbo].[password_reset_tokens]
GO

CREATE TABLE [dbo].[password_reset_tokens] (
  [email] nvarchar(255) COLLATE Latin1_General_CI_AI  NOT NULL,
  [token] nvarchar(255) COLLATE Latin1_General_CI_AI  NOT NULL,
  [created_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[password_reset_tokens] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[personal_access_tokens]') AND type IN ('U'))
	DROP TABLE [dbo].[personal_access_tokens]
GO

CREATE TABLE [dbo].[personal_access_tokens] (
  [id] bigint  IDENTITY(1,1) NOT NULL,
  [tokenable_type] nvarchar(255) COLLATE Latin1_General_CI_AI  NOT NULL,
  [tokenable_id] bigint  NOT NULL,
  [name] nvarchar(255) COLLATE Latin1_General_CI_AI  NOT NULL,
  [token] nvarchar(64) COLLATE Latin1_General_CI_AI  NOT NULL,
  [abilities] nvarchar(max) COLLATE Latin1_General_CI_AI  NULL,
  [last_used_at] datetime  NULL,
  [expires_at] datetime  NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[personal_access_tokens] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------
SET IDENTITY_INSERT [dbo].[personal_access_tokens] ON
GO

SET IDENTITY_INSERT [dbo].[personal_access_tokens] OFF
GO


-- ----------------------------
-- Table structure for transaction
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[transaction]') AND type IN ('U'))
	DROP TABLE [dbo].[transaction]
GO

CREATE TABLE [dbo].[transaction] (
  [id] bigint  IDENTITY(1,1) NOT NULL,
  [document_code] nvarchar(3) COLLATE Latin1_General_CI_AI  NOT NULL,
  [document_number] nvarchar(10) COLLATE Latin1_General_CI_AI  NOT NULL,
  [user] nvarchar(50) COLLATE Latin1_General_CI_AI  NOT NULL,
  [total] float(53) DEFAULT '0' NULL,
  [tgl_trx] date  NOT NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL,
  [status] nvarchar(255) COLLATE Latin1_General_CI_AI DEFAULT 'pending' NOT NULL,
  [id_user] int  NOT NULL
)
GO

ALTER TABLE [dbo].[transaction] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of transaction
-- ----------------------------
SET IDENTITY_INSERT [dbo].[transaction] ON
GO

INSERT INTO [dbo].[transaction] ([id], [document_code], [document_number], [user], [total], [tgl_trx], [created_at], [updated_at], [status], [id_user]) VALUES (N'1', N'TRX', N'0000000001', N'User', N'88000', N'2024-02-06', NULL, N'2024-02-06 06:42:51.000', N'complete', N'2')
GO

INSERT INTO [dbo].[transaction] ([id], [document_code], [document_number], [user], [total], [tgl_trx], [created_at], [updated_at], [status], [id_user]) VALUES (N'2', N'TRX', N'0000000002', N'User', N'86000', N'2024-02-06', NULL, N'2024-02-06 08:10:01.000', N'complete', N'2')
GO

INSERT INTO [dbo].[transaction] ([id], [document_code], [document_number], [user], [total], [tgl_trx], [created_at], [updated_at], [status], [id_user]) VALUES (N'3', N'TRX', N'0000000003', N'User', N'41000', N'2024-02-06', NULL, N'2024-02-06 08:13:26.623', N'complete', N'2')
GO

INSERT INTO [dbo].[transaction] ([id], [document_code], [document_number], [user], [total], [tgl_trx], [created_at], [updated_at], [status], [id_user]) VALUES (N'4', N'TRX', N'0000000004', N'User', N'26000', N'2024-02-06', NULL, N'2024-02-06 08:18:31.000', N'complete', N'2')
GO

INSERT INTO [dbo].[transaction] ([id], [document_code], [document_number], [user], [total], [tgl_trx], [created_at], [updated_at], [status], [id_user]) VALUES (N'5', N'TRX', N'0000000005', N'User', N'60000', N'2024-02-06', NULL, N'2024-02-06 08:27:46.000', N'complete', N'2')
GO

INSERT INTO [dbo].[transaction] ([id], [document_code], [document_number], [user], [total], [tgl_trx], [created_at], [updated_at], [status], [id_user]) VALUES (N'6', N'TRX', N'0000000006', N'User', N'60000', N'2024-02-06', NULL, N'2024-02-06 08:48:14.000', N'complete', N'2')
GO

INSERT INTO [dbo].[transaction] ([id], [document_code], [document_number], [user], [total], [tgl_trx], [created_at], [updated_at], [status], [id_user]) VALUES (N'7', N'TRX', N'0000000007', N'User', N'102000', N'2024-02-06', NULL, N'2024-02-06 09:03:33.000', N'complete', N'2')
GO

INSERT INTO [dbo].[transaction] ([id], [document_code], [document_number], [user], [total], [tgl_trx], [created_at], [updated_at], [status], [id_user]) VALUES (N'8', N'TRX', N'0000000008', N'User', N'86000', N'2024-02-06', NULL, N'2024-02-06 09:05:28.000', N'complete', N'2')
GO

SET IDENTITY_INSERT [dbo].[transaction] OFF
GO


-- ----------------------------
-- Table structure for transaction_detail
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[transaction_detail]') AND type IN ('U'))
	DROP TABLE [dbo].[transaction_detail]
GO

CREATE TABLE [dbo].[transaction_detail] (
  [id] bigint  IDENTITY(1,1) NOT NULL,
  [id_transaction] int  NOT NULL,
  [document_code] nvarchar(3) COLLATE Latin1_General_CI_AI  NOT NULL,
  [document_number] nvarchar(10) COLLATE Latin1_General_CI_AI  NOT NULL,
  [product_code] nvarchar(18) COLLATE Latin1_General_CI_AI  NOT NULL,
  [price] float(53) DEFAULT '0' NULL,
  [quantity] int DEFAULT '1' NOT NULL,
  [unit] nvarchar(5) COLLATE Latin1_General_CI_AI  NOT NULL,
  [subtotal] float(53) DEFAULT '0' NULL,
  [currency] nvarchar(5) COLLATE Latin1_General_CI_AI  NOT NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL,
  [product_id] int  NULL,
  [product_name] nvarchar(255) COLLATE Latin1_General_CI_AI  NULL
)
GO

ALTER TABLE [dbo].[transaction_detail] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of transaction_detail
-- ----------------------------
SET IDENTITY_INSERT [dbo].[transaction_detail] ON
GO

INSERT INTO [dbo].[transaction_detail] ([id], [id_transaction], [document_code], [document_number], [product_code], [price], [quantity], [unit], [subtotal], [currency], [created_at], [updated_at], [product_id], [product_name]) VALUES (N'1', N'1', N'TRX', N'0000000001', N'SKUSKILNP', N'15000', N'1', N'PCS', N'15000', N'IDR', N'2024-02-06 06:42:24.000', NULL, N'1', N'So klin Pewangi')
GO

INSERT INTO [dbo].[transaction_detail] ([id], [id_transaction], [document_code], [document_number], [product_code], [price], [quantity], [unit], [subtotal], [currency], [created_at], [updated_at], [product_id], [product_name]) VALUES (N'2', N'1', N'TRX', N'0000000001', N'SKUGIVBR1', N'11000', N'5', N'PCS', N'55000', N'IDR', N'2024-02-06 06:42:26.000', N'2024-02-06 06:42:37.000', N'2', N'GIV Biru')
GO

INSERT INTO [dbo].[transaction_detail] ([id], [id_transaction], [document_code], [document_number], [product_code], [price], [quantity], [unit], [subtotal], [currency], [created_at], [updated_at], [product_id], [product_name]) VALUES (N'3', N'1', N'TRX', N'0000000001', N'SKUSKILNL', N'18000', N'1', N'PCS', N'18000', N'IDR', N'2024-02-06 06:42:28.000', NULL, N'3', N'So Klin Liquid')
GO

INSERT INTO [dbo].[transaction_detail] ([id], [id_transaction], [document_code], [document_number], [product_code], [price], [quantity], [unit], [subtotal], [currency], [created_at], [updated_at], [product_id], [product_name]) VALUES (N'4', N'2', N'TRX', N'0000000002', N'SKUSUNLIGH00000001', N'12000', N'3', N'PCS', N'36000', N'IDR', N'2024-02-06 07:14:14.000', N'2024-02-06 08:09:57.333', N'6', N'Sunlight')
GO

INSERT INTO [dbo].[transaction_detail] ([id], [id_transaction], [document_code], [document_number], [product_code], [price], [quantity], [unit], [subtotal], [currency], [created_at], [updated_at], [product_id], [product_name]) VALUES (N'5', N'2', N'TRX', N'0000000002', N'SKUGIVUNGU00000001', N'10000', N'5', N'PCS', N'50000', N'IDR', N'2024-02-06 07:14:18.000', N'2024-02-06 08:09:59.323', N'4', N'GIV Ungu')
GO

INSERT INTO [dbo].[transaction_detail] ([id], [id_transaction], [document_code], [document_number], [product_code], [price], [quantity], [unit], [subtotal], [currency], [created_at], [updated_at], [product_id], [product_name]) VALUES (N'6', N'3', N'TRX', N'0000000003', N'SKUSKILNP', N'15000', N'2', N'PCS', N'30000', N'IDR', N'2024-02-06 08:13:06.000', N'2024-02-06 08:13:26.617', N'1', N'So klin Pewangi')
GO

INSERT INTO [dbo].[transaction_detail] ([id], [id_transaction], [document_code], [document_number], [product_code], [price], [quantity], [unit], [subtotal], [currency], [created_at], [updated_at], [product_id], [product_name]) VALUES (N'7', N'3', N'TRX', N'0000000003', N'SKUGIVBR', N'11000', N'1', N'PCS', N'11000', N'IDR', N'2024-02-06 08:13:08.000', NULL, N'2', N'GIV Biru')
GO

INSERT INTO [dbo].[transaction_detail] ([id], [id_transaction], [document_code], [document_number], [product_code], [price], [quantity], [unit], [subtotal], [currency], [created_at], [updated_at], [product_id], [product_name]) VALUES (N'8', N'4', N'TRX', N'0000000004', N'SKUSKILNP', N'15000', N'1', N'PCS', N'15000', N'IDR', N'2024-02-06 08:13:30.000', NULL, N'1', N'So klin Pewangi')
GO

INSERT INTO [dbo].[transaction_detail] ([id], [id_transaction], [document_code], [document_number], [product_code], [price], [quantity], [unit], [subtotal], [currency], [created_at], [updated_at], [product_id], [product_name]) VALUES (N'9', N'4', N'TRX', N'0000000004', N'SKUGIVBR', N'11000', N'1', N'PCS', N'11000', N'IDR', N'2024-02-06 08:13:32.000', NULL, N'2', N'GIV Biru')
GO

INSERT INTO [dbo].[transaction_detail] ([id], [id_transaction], [document_code], [document_number], [product_code], [price], [quantity], [unit], [subtotal], [currency], [created_at], [updated_at], [product_id], [product_name]) VALUES (N'10', N'5', N'TRX', N'0000000005', N'SKUMAMALIM00000001', N'12000', N'1', N'PCS', N'12000', N'IDR', N'2024-02-06 08:27:35.000', NULL, N'8', N'Mama Lime')
GO

INSERT INTO [dbo].[transaction_detail] ([id], [id_transaction], [document_code], [document_number], [product_code], [price], [quantity], [unit], [subtotal], [currency], [created_at], [updated_at], [product_id], [product_name]) VALUES (N'11', N'5', N'TRX', N'0000000005', N'SKUSUNLIGH00000001', N'12000', N'4', N'PCS', N'48000', N'IDR', N'2024-02-06 08:27:38.000', N'2024-02-06 08:27:40.000', N'6', N'Sunlight')
GO

INSERT INTO [dbo].[transaction_detail] ([id], [id_transaction], [document_code], [document_number], [product_code], [price], [quantity], [unit], [subtotal], [currency], [created_at], [updated_at], [product_id], [product_name]) VALUES (N'12', N'6', N'TRX', N'0000000006', N'SKUMAMALIM00000001', N'12000', N'2', N'PCS', N'24000', N'IDR', N'2024-02-06 08:36:23.000', N'2024-02-06 08:48:08.650', N'8', N'Mama Lime')
GO

INSERT INTO [dbo].[transaction_detail] ([id], [id_transaction], [document_code], [document_number], [product_code], [price], [quantity], [unit], [subtotal], [currency], [created_at], [updated_at], [product_id], [product_name]) VALUES (N'13', N'6', N'TRX', N'0000000006', N'SKUSUNLIGH00000001', N'12000', N'3', N'PCS', N'36000', N'IDR', N'2024-02-06 08:36:24.000', N'2024-02-06 08:45:27.577', N'6', N'Sunlight')
GO

INSERT INTO [dbo].[transaction_detail] ([id], [id_transaction], [document_code], [document_number], [product_code], [price], [quantity], [unit], [subtotal], [currency], [created_at], [updated_at], [product_id], [product_name]) VALUES (N'14', N'7', N'TRX', N'0000000007', N'SKUSUNLIGH00000001', N'12000', N'1', N'PCS', N'12000', N'IDR', N'2024-02-06 09:02:20.000', NULL, N'6', N'Sunlight')
GO

INSERT INTO [dbo].[transaction_detail] ([id], [id_transaction], [document_code], [document_number], [product_code], [price], [quantity], [unit], [subtotal], [currency], [created_at], [updated_at], [product_id], [product_name]) VALUES (N'15', N'7', N'TRX', N'0000000007', N'SKUGIVUNGU00000001', N'10000', N'1', N'PCS', N'10000', N'IDR', N'2024-02-06 09:02:23.000', NULL, N'4', N'GIV Ungu')
GO

INSERT INTO [dbo].[transaction_detail] ([id], [id_transaction], [document_code], [document_number], [product_code], [price], [quantity], [unit], [subtotal], [currency], [created_at], [updated_at], [product_id], [product_name]) VALUES (N'16', N'7', N'TRX', N'0000000007', N'SKUSKILNL', N'18000', N'2', N'PCS', N'36000', N'IDR', N'2024-02-06 09:02:25.000', N'2024-02-06 09:02:33.000', N'3', N'So Klin Liquid')
GO

INSERT INTO [dbo].[transaction_detail] ([id], [id_transaction], [document_code], [document_number], [product_code], [price], [quantity], [unit], [subtotal], [currency], [created_at], [updated_at], [product_id], [product_name]) VALUES (N'17', N'7', N'TRX', N'0000000007', N'SKUGIVBR', N'11000', N'4', N'PCS', N'44000', N'IDR', N'2024-02-06 09:02:27.000', N'2024-02-06 09:02:47.000', N'2', N'GIV Biru')
GO

INSERT INTO [dbo].[transaction_detail] ([id], [id_transaction], [document_code], [document_number], [product_code], [price], [quantity], [unit], [subtotal], [currency], [created_at], [updated_at], [product_id], [product_name]) VALUES (N'19', N'8', N'TRX', N'0000000008', N'SKUGIVBR', N'11000', N'2', N'PCS', N'22000', N'IDR', N'2024-02-06 09:04:20.000', N'2024-02-06 09:05:22.970', N'2', N'GIV Biru')
GO

INSERT INTO [dbo].[transaction_detail] ([id], [id_transaction], [document_code], [document_number], [product_code], [price], [quantity], [unit], [subtotal], [currency], [created_at], [updated_at], [product_id], [product_name]) VALUES (N'20', N'8', N'TRX', N'0000000008', N'SKUSKILNL', N'18000', N'3', N'PCS', N'54000', N'IDR', N'2024-02-06 09:04:22.000', N'2024-02-06 09:04:57.057', N'3', N'So Klin Liquid')
GO

INSERT INTO [dbo].[transaction_detail] ([id], [id_transaction], [document_code], [document_number], [product_code], [price], [quantity], [unit], [subtotal], [currency], [created_at], [updated_at], [product_id], [product_name]) VALUES (N'21', N'8', N'TRX', N'0000000008', N'SKUGIVUNGU00000001', N'10000', N'1', N'PCS', N'10000', N'IDR', N'2024-02-06 09:04:49.000', N'2024-02-06 09:04:58.310', N'4', N'GIV Ungu')
GO

SET IDENTITY_INSERT [dbo].[transaction_detail] OFF
GO


-- ----------------------------
-- Table structure for users
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[users]') AND type IN ('U'))
	DROP TABLE [dbo].[users]
GO

CREATE TABLE [dbo].[users] (
  [id] bigint  IDENTITY(1,1) NOT NULL,
  [name] nvarchar(255) COLLATE Latin1_General_CI_AI  NOT NULL,
  [email] nvarchar(255) COLLATE Latin1_General_CI_AI  NOT NULL,
  [type] int DEFAULT '2' NOT NULL,
  [email_verified_at] datetime  NULL,
  [password] nvarchar(255) COLLATE Latin1_General_CI_AI  NOT NULL,
  [remember_token] nvarchar(100) COLLATE Latin1_General_CI_AI  NULL,
  [created_at] datetime  NULL,
  [updated_at] datetime  NULL
)
GO

ALTER TABLE [dbo].[users] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of users
-- ----------------------------
SET IDENTITY_INSERT [dbo].[users] ON
GO

INSERT INTO [dbo].[users] ([id], [name], [email], [type], [email_verified_at], [password], [remember_token], [created_at], [updated_at]) VALUES (N'1', N'Admin', N'admin@admin.com', N'1', NULL, N'$2y$12$HYQJ0Xu.aMWuiB5l5c5RYu8SOykXhlV73gOXQk9NUFQtMW3GtEyr.', NULL, N'2024-02-06 06:42:02.000', NULL)
GO

INSERT INTO [dbo].[users] ([id], [name], [email], [type], [email_verified_at], [password], [remember_token], [created_at], [updated_at]) VALUES (N'2', N'User', N'user@user.com', N'2', NULL, N'$2y$12$6ASE6IjY3gvtqbR99Stkq.ZvdHNuiBWpazVRxDwiXxG7OoSo5pCMK', NULL, N'2024-02-06 06:42:02.000', NULL)
GO

SET IDENTITY_INSERT [dbo].[users] OFF
GO


-- ----------------------------
-- Auto increment value for failed_jobs
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[failed_jobs]', RESEED, 1)
GO


-- ----------------------------
-- Indexes structure for table failed_jobs
-- ----------------------------
CREATE UNIQUE NONCLUSTERED INDEX [failed_jobs_uuid_unique]
ON [dbo].[failed_jobs] (
  [uuid] ASC
)
GO


-- ----------------------------
-- Primary Key structure for table failed_jobs
-- ----------------------------
ALTER TABLE [dbo].[failed_jobs] ADD CONSTRAINT [PK__failed_j__3213E83FA67809EB] PRIMARY KEY CLUSTERED ([id])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for m_product
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[m_product]', RESEED, 9)
GO


-- ----------------------------
-- Indexes structure for table m_product
-- ----------------------------
CREATE UNIQUE NONCLUSTERED INDEX [m_product_product_code_unique]
ON [dbo].[m_product] (
  [product_code] ASC
)
GO


-- ----------------------------
-- Primary Key structure for table m_product
-- ----------------------------
ALTER TABLE [dbo].[m_product] ADD CONSTRAINT [PK__m_produc__3213E83FC09CB021] PRIMARY KEY CLUSTERED ([id])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for migrations
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[migrations]', RESEED, 11)
GO


-- ----------------------------
-- Primary Key structure for table migrations
-- ----------------------------
ALTER TABLE [dbo].[migrations] ADD CONSTRAINT [PK__migratio__3213E83F4A32AAD7] PRIMARY KEY CLUSTERED ([id])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Primary Key structure for table password_reset_tokens
-- ----------------------------
ALTER TABLE [dbo].[password_reset_tokens] ADD CONSTRAINT [password_reset_tokens_email_primary] PRIMARY KEY CLUSTERED ([email])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for personal_access_tokens
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[personal_access_tokens]', RESEED, 1)
GO


-- ----------------------------
-- Indexes structure for table personal_access_tokens
-- ----------------------------
CREATE NONCLUSTERED INDEX [personal_access_tokens_tokenable_type_tokenable_id_index]
ON [dbo].[personal_access_tokens] (
  [tokenable_type] ASC,
  [tokenable_id] ASC
)
GO

CREATE UNIQUE NONCLUSTERED INDEX [personal_access_tokens_token_unique]
ON [dbo].[personal_access_tokens] (
  [token] ASC
)
GO


-- ----------------------------
-- Primary Key structure for table personal_access_tokens
-- ----------------------------
ALTER TABLE [dbo].[personal_access_tokens] ADD CONSTRAINT [PK__personal__3213E83F7EFFE7D2] PRIMARY KEY CLUSTERED ([id])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for transaction
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[transaction]', RESEED, 8)
GO


-- ----------------------------
-- Checks structure for table transaction
-- ----------------------------
ALTER TABLE [dbo].[transaction] ADD CONSTRAINT [CK__transacti__statu__48CFD27E] CHECK ([status]=N'failed' OR [status]=N'complete' OR [status]=N'pending')
GO


-- ----------------------------
-- Primary Key structure for table transaction
-- ----------------------------
ALTER TABLE [dbo].[transaction] ADD CONSTRAINT [PK__transact__3213E83FDA77225F] PRIMARY KEY CLUSTERED ([id])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for transaction_detail
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[transaction_detail]', RESEED, 21)
GO


-- ----------------------------
-- Primary Key structure for table transaction_detail
-- ----------------------------
ALTER TABLE [dbo].[transaction_detail] ADD CONSTRAINT [PK__transact__3213E83F695A8AD6] PRIMARY KEY CLUSTERED ([id])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Auto increment value for users
-- ----------------------------
DBCC CHECKIDENT ('[dbo].[users]', RESEED, 2)
GO


-- ----------------------------
-- Indexes structure for table users
-- ----------------------------
CREATE UNIQUE NONCLUSTERED INDEX [users_email_unique]
ON [dbo].[users] (
  [email] ASC
)
GO


-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE [dbo].[users] ADD CONSTRAINT [PK__users__3213E83FC0C45F78] PRIMARY KEY CLUSTERED ([id])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO

